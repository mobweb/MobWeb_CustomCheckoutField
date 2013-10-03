# MobWeb_CustomCheckoutField
While studying Magento I found that the easiest way for me personally to learn something new is to break everything down into smaller parts. This extension is such a "smaller part". It doesn't really add any value and can't be used directly, instead it can help to provide an overview about how a task is accomplished in Magento. See my [other repositories](https://github.com/mobweb?tab=repositories) for more such example extensions.

## Description
This example module adds a custom field to the checkout process. The user entered value is saved with the order and visible on the order information page in the admin panel.

## How it works

### Setup:
* An install script adds a new field to the "quote" (cart) and "order" models (`mysql4-install-0.1.0.php`)

### Frontend:
* The onepage checkout process is updated (`frontend/customcheckoutfield.xml`) to use a modified template (`billing.phtml`) that includes a new block (field.phtml)
* During the onepage checkout process, before the "quote" model is saved and converted into an "order" model, an observer (`Observer.php`) kicks in and retrieves the user entered custom field value from the request and saves that alongside the "quote" model. This ensures that the custom field's value is saved as part of the order

### Backend:
* The order information page is updated (`adminhtml/customcheckoutfield.xml`) to use an updated template (`adminhtml/tab/info.phtml`) that includes a custom block (`customcheckoutfield.phtml`) so that the user entered custom field value is visible for the admin

## Installation
Install using [colinmollenhour/modman](https://github.com/colinmollenhour/modman/).