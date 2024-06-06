# mysendingbox-php

[![Packagist version](https://img.shields.io/packagist/v/mysendingbox/mysendingbox-php.svg)](https://github.com/mysendingbox/mysendingbox-php)

MySendingBox.fr PHP Client is a simple but flexible wrapper for the [MySendingBox.fr](https://www.mysendingbox.fr/) API. See full MySendingBox.fr documentation [here](https://docs.mysendingbox.fr/). For best results, be sure that you're using the latest version of the MySendingBox API and the lastest version of PHP Wrapper.

## Table of Contents

- [Getting Started](#getting-started)
  - [Registration](#registration)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Letters](#letters)
  - [Accounts](#accounts)
  - [Invoices](#invoices)
- [Examples](#examples)

## Getting Started

Here's a general overview of the Mysendingbox services available, click through to read more.


Please read through the official [API Documentation](https://docs.mysendingbox.fr/?php#) to get a complete sense of what to expect from each endpoint.

### Registration

First, you will need to first create an account at [Mysendingbox.fr](https://www.mysendingbox.fr/signup) and obtain your Test and Live API Keys.

Once you have created an account, you can access your API Keys from the [API keys Panel](https://www.mysendingbox.fr/app/dashboard/keys).

### Installation

The recommended way to install Mysendingbox.fr PHP Client is through [Composer](http://getcomposer.org).

```bash
// Install Composer
curl -sS https://getcomposer.org/installer | php

// Add Mysendingbox.fr PHP client as a dependency
composer require mysendingbox/mysendingbox-php
```

### Usage

After installing, you need to require Composer's autoloader
```php
require 'vendor/autoload.php';
```

You need to instantiante a MysendingBoxClient object

```php
use Mysendingbox\MysendingboxClient;

$mysendingbox = new MysendingboxClient('API_KEY'); //replace 'API_KEY' with your API keys

```

The **MysendingBoxClient** object allows you to access all the necessary functions to manage the API. 
The MysendingboxClient class also offers a set of constants that you can use at your convenience.

```php
    public const POSTAGE_SPEED_EXPRESS = 'express';
    public const POSTAGE_SPEED_D = 'D';
    public const POSTAGE_SPEED_D1 = 'D1';
    public const POSTAGE_TYPE_PAPER_ECOPLI = 'ecopli';
    public const POSTAGE_TYPE_PAPER_PRIORITAIRE = 'prioritaire';
    public const POSTAGE_TYPE_PAPER_LR = 'lr';
    public const POSTAGE_TYPE_PAPER_LRAR = 'lrar';
    public const POSTAGE_TYPE_ELECTRONIC_ERE = 'ere';
    public const POSTAGE_TYPE_ELECTRONIC_LRE = 'lre';
    public const POSTAGE_TYPE_ELECTRONIC_EMAIL = 'email';
    public const ELECTRONIC_STATUS_INDIVIDUAL = 'individual';
    public const ELECTRONIC_STATUS_PROFESSIONAL = 'professional';
    public const COLOR_BW = 'bw';
    public const COLOR_COLOR = 'color';
    public const SOURCE_FILE_TYPE_FILE = 'file';
    public const SOURCE_FILE_TYPE_TEMPLATE_ID = 'template_id';
    public const SOURCE_FILE_TYPE_REMOTE = 'remote';
    public const SOURCE_FILE_TYPE_HTML = 'html';
    public const ADDRESS_PLACEMENT_FIRST_PAGE = 'first_page';
    public const ADDRESS_PLACEMENT_INSERT_BLANK_PAGE = 'insert_blank_page';
    public const ENVELOPE_C4 = 'c4';
    public const ENVELOPE_C6 = 'c6';
    public const ENVELOPE_WINDOW_SIMPLE = 'simple';
    public const ENVELOPE_WINDOW_DOUBLE = 'double';
    public const ELECTRIC_CONTENT_TEXT = 'text';
    public const ELECTRIC_CONTENT_HTML = 'html';
```
__See below for use cases.__


### Letters
The creation process differs between paper and electronic letters, but retrieving letters remains the same for both paper and electronic formats.

#### Create a new Paper Letter
The wrapper provides an object to manage addresses called **AddressPaper**. Create an instance of this object for the recipient's address and optionally for the sender's address.

```php
// final class AddressPaper 
// public function __construct(
//   string $line1,
//   string $city,
//   string $postalCode,
//   string $country,
//   ?string $name = null,
//   ?string $company = null,
//   ?string $line2 = null,
//   ?string $line3 = null
// ) 
$to_address = new AddressPaper(
'30 rue de rivoli', //$line1
'Paris', //$city
'75001', //$postalCode
'France', //$country
'Mysendingbox from PHP wrapper', //$name (optional )
);

$from_address = new AddressPaper(
'105 rue Gambetta', //$line1
'Lyon', //$city
'69007', //$postalCode
'France', //$country
);

```
The function responsible for creating a paper mail is called **createPaperLetter()**.
Here is an overview of the arguments that can be provided to the function.
__The first 5 arguments are required__

 ```php
 // public function createPaperLetter(
// AddressPaper $to,
// string $color,
// string $postageType,
// string $sourceFile,
// string $sourceFileType,
// // Not required
// ?string $description = null,
// ?AddressPaper $from = null,
// ?string $sourceFile2 = null,
// ?string $sourceFileType2 = null,
// ?string $sourceFile3 = null,
// ?string $sourceFileType3 = null,
// ?string $sourceFile4 = null,
// ?string $sourceFileType4 = null,
// ?string $sourceFile5 = null,
// ?string $sourceFileType5 = null,
// ?bool $bothSides = null,
// ?bool $staple = null,
// ?\DateTimeInterface $sendDate = null,
// ?string $addressPlacement = null,
// ?string $postageSpeed = null,
// ?int $pdfMargin = null,
// ?ReadAddressFromPdf $readAddressFromPdf = null,
// ?bool $manageDeliveryProof = null,
// ?bool $manageReturnedMail = null,
// ?string $envelope = null,
// ?string $envelopeWindow = null,
// ?bool $printSenderAddress = null,
// ?array $variables = null,
// ?array $metadata = null
// )
 ```

You can freely use the values or constants provided by the application in the MysendingboxCleint class.

Here is a complete working example
```php
<?php
require 'vendor/autoload.php';

use Mysendingbox\MysendingboxClient;
use Mysendingbox\Model\AddressPaper;

$mysendingbox = new MysendingboxClient(API_KEY); // replace with you API keys 

$to_address = new AddressPaper(
'30 rue de rivoli', //$line1
'Paris', //$city
'75001', //$postalCode
'France', //$country
'Mysendingbox from PHP wrapper', //$name (optional )
);

$from_address = new AddressPaper(
'105 rue Gambetta', //$line1
'Lyon', //$city
'69007', //$postalCode
'France', //$country
);
  
  $letter = $mysendingbox->createPaperLetter(
    $to_address, // destination AddressPaper object
    MysendingboxClient::COLOR_BW, //choose between black and white or color
    MysendingboxClient::POSTAGE_TYPE_ELECTRONIC_LRE, //postageType
    '<h1>Hello World</h1>', //sourceFile
    MysendingboxClient::ELECTRIC_CONTENT_HTML, //sourceFileType
    'Test letter from PHP wrapper', //description
    $from_address, //from AddressPaper type
  
  );

  print_r($letter);
  ?>
```
#### Create a new Electronic Letter

The wrapper provides an object called **AddressElectronic** to manage electronic addresses.
__First create an instance of this object__

```php
// final class AddressElectronic 
// public function __construct(
//     string $email,
//     ?string $status = MysendingboxClient::ELECTRONIC_STATUS_INDIVIDUAL,
//     ?string $company = null,
//     ?string $firstName = null,
//     ?string $lastName = null
// ) 

$to_address = new AddressElectronic(
    'Johndoe@example.com', //$email
    'individual', //$status
    null, //$company (optional)
    'John', //$firstName (optional)
    'Doe' //$lastName (optional)
);
```
The function to implement for sending electronic letters is **createElectronicLetter()**
__The first 4 arguments are required__

``php
// public function createElectronicLetter(
//     AddressElectronic $to,
//     string $postageType,
//     string $sourceFile,
//     string $sourceFileType,
//     // Not required
//     ?string $description = null,
//     ?string $sourceFile2 = null,
//     ?string $sourceFileType2 = null,
//     ?string $sourceFile3 = null,
//     ?string $sourceFileType3 = null,
//     ?string $sourceFile4 = null,
//     ?string $sourceFileType4 = null,
//     ?string $sourceFile5 = null,
//     ?string $sourceFileType5 = null,
//     ?\DateTimeInterface $sendDate = null,
//     ?string $content = null,
//     ?string $contentType = null,
//     ?string $replyTo = null,
//     ?array $variables = null,
//     ?array $metadata = null
// )
```

Here is a complete working example 

```php
<?php
require 'vendor/autoload.php';

use Mysendingbox\MysendingboxClient;
use Mysendingbox\Model\AddressElectronic;

$mysendingbox = new MysendingboxClient(API_KEY); // don't forget to change with your API keys

$to_address = new AddressElectronic(
    'Johndoe@example.com', //$email
    'individual', //$status
    null, //$company (optional)
    'John', //$firstName (optional)
    'Doe' //$lastName (optional)
);

$letter = $mysendingbox->createElectronicLetter(
    $to_address, // destination AddressElectronic object
    MysendingboxClient::POSTAGE_TYPE_ELECTRONIC_LRE, //postageType
    '<html> This is the electronic letter attached document </html>', // $sourceFile
    MysendingboxClient::ELECTRIC_CONTENT_HTML, //sourceFileType
    'Test Electronic letter from PHP wrapper', // $description (optional)
    null, // $sourceFile2 (optional)
    null, // $sourceFileType2 (optional)
    null, // $sourceFile3 (optional)
    null, // $sourceFileType3 (optional)
    null, // $sourceFile4 (optional)
    null, // $sourceFileType4 (optional)
    null, // $sourceFile5 (optional)
    null, // $sourceFileType5 (optional)
    null, // $sendDate (optional)
    'Please review the attached documents', // $content (optional)
);

print_r($letter);
?>
```

#### Get a specific letter

You can use **getLetter()** function, wich require the id of the letter to retrieve (both paper and electronic)

```php
<?php
require 'vendor/autoload.php';
use Mysendingbox\MysendingboxClient;

$mysendingbox = new MysendingboxClient('API_KEY'); // replace 'API_KEY' with your API keys

$letterId = 'LETTER_ID'; // Replace 'LETTER_ID' with the ID of the letter you want to retrieve

$letter = $mysendingbox->getLetter($letterId);

print_r($letter);

?>
```
