<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

<h1 align="center">What In Box Plugin</h1>

<p align="center">This plugin helps to explain customers what inside the box of product which you sell.</p>

## Install

1. Run `composer require vldmr-k/sylius-what-in-box-plugin`

2. Run `bin/console doctrine:migrations:diff` and apply migrations

3. Append next line to file `config/routes/sylius_admin.yaml`

```yaml
vldmrk_what_in_box_admin:
    resource: "@VldmrkSyliusWhatInBoxPlugin/Resources/config/admin_routing.yml"
    prefix: '/%sylius_admin.path_name%'
```


## Example

######  What In Box List
![What In Box List](examples/list.png?raw=true "Title")

###### Create What In Box
![Create What In Box](examples/new.png?raw=true "Title")

###### Edit What In Box
![Edit What In Box](examples/edit.png?raw=true "Title")


###### How it looks on product page
![Edit What In Box](examples/product_show.png?raw=true "Title")

