/*
 * This file is part of the WhatInBox sylius package.
 *
 * (c) Volodymyr Konchakovskyi
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$.fn.extend({
    moveWhatInBox(positionInput) {
        const whatInboxRows = [];
        const element = this;
        element.api({
            method: 'PUT',
            beforeSend(settings) {
                /* eslint-disable-next-line no-param-reassign */
                settings.data = {
                    whatInBoxPositions: whatInboxRows,
                    _csrf_token: element.data('csrf-token'),
                };

                return settings;
            },
            onSuccess() {
                window.location.reload();
            },
        });

        positionInput.on('input', (event) => {
            const input = $(event.currentTarget);
            const whatInBoxId = input.data('id');
            const row = whatInboxRows.find(({ id }) => id === whatInBoxId);

            if (!row) {
                whatInboxRows.push({
                    id: whatInBoxId,
                    position: input.val(),
                });
            } else {
                row.position = input.val();
            }
        });
    },
});

$(document).ready(function(){
    $('.sylius-update-what-in-box').moveWhatInBox($('.sylius-what-in-box-position'));
})
