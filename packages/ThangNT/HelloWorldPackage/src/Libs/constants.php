<?php

/**
 * Define User Role
 */
define('ROLE_ADMIN'    , 1);
define('ROLE_SALE'     , 2);
define('ROLE_LOGISTIC' , 3);
define('ROLE_SUPPORTER', 4);

/**
 * Define User Status
 */
define('USER_STATUS_INACTIVE' , 0);
define('USER_STATUS_ACTIVE'   , 1);

/**
 * Define User Gender
 */
define('USER_GENDER_FEMALE' , 0);
define('USER_GENDER_MALE'   , 1);

/**
 * Define Event status
 */
define('EVENT_STATUS_OPEN'  , 0);
define('EVENT_STATUS_CLOSE' , 1);

/**
 * Define Use Status Coupon of Customer
 */
define('COUPON_CUSTOMER_STATUS_UNUSED' , 0);
define('COUPON_CUSTOMER_STATUS_USED'   , 1);

/**
 * Define Coupon status
 */
define('COUPON_STATUS_ACTIVE' , 0);
define('COUPON_STATUS_EXPIRED', 1);
define('COUPON_STATUS_USED'   , 2);

/**
 * Define Coupon Type
 */
define('COUPON_TYPE_PUBLIC'   , 0);
define('COUPON_TYPE_PRIVATE'  , 1);

/**
 * Define Coupon Rate type
 */
define('COUPON_DISCOUNT_RATE_TYPE_PERCENT'   , 0);
define('COUPON_DISCOUNT_RATE_TYPE_VALUE'     , 1);


/**
 * Define Todo Type
 */
define('TODO_TYPE_PRIVATE'  , 0);
define('TODO_TYPE_PUBLIC'   , 1);
define('TODO_TYPE_ALL'      , 2);

/**
 * Define Todo Status
 */
define('TODO_STATUS_COMPLETE'   , 1);
define('TODO_STATUS_INCOMPLETE' , 0);

/**
 * Define Calendar Type
 */
define('CALENDAR_TYPE_PRIVATE'  , 0);
define('CALENDAR_TYPE_PUBLIC'   , 1);
define('CALENDAR_TYPE_ALL'      , 2);

/**
 * Define Calendar Status
 */
define('CALENDAR_STATUS_COMPLETE'   , 1);
define('CALENDAR_STATUS_INCOMPLETE' , 0);

/**
 * Define Images Type
 */
define('IMAGE_TYPE_NULL'      , 0);
define('IMAGE_TYPE_AVATAR'    , 1);
define('IMAGE_TYPE_TEMPLATE'  , 2);
define('IMAGE_TYPE_ART'       , 3);
define('IMAGE_TYPE_COUPON'    , 4);
define('IMAGE_TYPE_PROMOTION' , 5);
define('IMAGE_TYPE_PRODUCT'   , 6);
define('IMAGE_TYPE_BANNER'    , 7);
define('IMAGE_TYPE_DESIGN_THUMBNAIL' , 8);

/**
 * Define Promotion status
 */
define('PROMOTION_STATUS_OPEN'  , 0);
define('PROMOTION_STATUS_CLOSE' , 1);

/**
 * Define Coupon Type
 */
define('PROMOTION_DISCOUNT_RATE_TYPE_PERCENT' , 0);
define('PROMOTION_DISCOUNT_RATE_TYPE_VALUE'   , 1);

/**
 * Define Promotion Type
 */
define('PROMOTION_TYPE_PUBLIC'  , 0);
define('PROMOTION_TYPE_PRIVATE' , 1);
define('PROMOTION_TYPE_ALL'     , 2);

/**
 * Define Contact Information status
 */
define('CONTACT_INFORMATION_TYPE_BILLING'  , 0);
define('CONTACT_INFORMATION_TYPE_SHIPPING' , 1);

/**
 * Define Template Type
 */
define('TEMPLATE_TYPE_STANDARD' , 0);
define('TEMPLATE_TYPE_SPECIAL'  , 1);

/**
 * Define Profile Type of Customer
 */
define('PROFILE_TYPE_STUDENT'   , 0);
define('PROFILE_TYPE_CORPORATE' , 1);
define('PROFILE_TYPE_PERSONAL'  , 2);

/**
 * Define Customer Status
 */
define('CUSTOMER_STATUS_INACTIVE' , 0);
define('CUSTOMER_STATUS_ACTIVE'   , 1);

/**
 * Define Banner Status
 */
define('BANNER_STATUS_INACTIVE' , 0);
define('BANNER_STATUS_ACTIVE'   , 1);

/**
 * Define Banner Display Type
 */
define('BANNER_DISPLAY_TYPE_ONE_COLUMN'   , 1);
define('BANNER_DISPLAY_TYPE_TWO_COLUMN'   , 2);
define('BANNER_DISPLAY_TYPE_THREE_COLUMN' , 3);

/**
 * Define Printing Type
 */
// define('PRINTING_TYPE_STUDENT'   , 0);
// define('PRINTING_TYPE_CORPORATE' , 1);
// define('PRINTING_TYPE_PERSONAL'  , 2);

/**
 * Define target devices of push notification action
 */
define('ALL_DEVICES'     , 0);
define('IOS_DEVICES'     , 1);
define('ANDROID_DEVICES' , 2);

/**
 * Define platforms
 */
define('PLATFORM_IOS'     , 1);
define('PLATFORM_ANDROID' , 2);
define('PLATFORM_WEB'     , 3);

/**
 * Define Payment status of Order
 */
define('PAYMENT_STATUS_UNPAID'       , 0);
define('PAYMENT_STATUS_PARTIAL_PAID' , 1);
define('PAYMENT_STATUS_PAID'         , 2);

/**
 * Define Status of Order
 */
define('ORDER_STATUS_NEW'            , 0);
define('ORDER_STATUS_QUOTATION_SENT' , 1);
define('ORDER_STATUS_INVOICE_SENT'   , 2);
define('ORDER_STATUS_PROCESSING'     , 3);
define('ORDER_STATUS_PRINTING'       , 4);
define('ORDER_STATUS_WAREHOUSE'      , 5);
define('ORDER_STATUS_ON_DELIVERY'    , 6);
define('ORDER_STATUS_DELIVERIED'     , 7);
define('ORDER_STATUS_CANCEL'         , 8);

/**
 * Define Payment Term of Payment
 */
define('PAYMENT_TERM_COD'           , 1);
define('PAYMENT_TERM_XX_DAYS_DELAY' , 2);
define('PAYMENT_TERM_NORMAL'        , 3);

/**
 * Define Payment Method of Payment
 */
define('PAYMENT_METHOD_NONE'          , 0);
define('PAYMENT_METHOD_CHEQUE'        , 1);
define('PAYMENT_METHOD_BANK_TRANSFER' , 2);
define('PAYMENT_METHOD_CASH'          , 3);
define('PAYMENT_METHOD_PAYPAL'        , 4);

/**
 * Define Status of Payment
 */
define('PAYMENT_PAID_STATUS_PENDING'   , 0);
define('PAYMENT_PAID_STATUS_CONFIRMED' , 1);
define('PAYMENT_PAID_STATUS_PAID'      , 2);

/**
 * Define type of Payment
 */
// define('PAYMENT_TYPE_'   , 0);
// define('PAYMENT_TYPE_' , 1);
// define('PAYMENT_TYPE_'      , 2);

/**
 * Define type invoice/quotation
 */
define('TYPE_INVOICE'   , 1);
define('TYPE_QUOTATION' , 2);

/**
 * Define action type
 * (Home page Frontend)
 */
define('DESIGN_NOW'                   , 0);
define('ADD_TO_CART_ONLY'             , 1);
define('ADD_TO_CART_AND_DESIGN_LATER' , 3);


/**
 * Define Social Account Provider
 */
define('PROVIDER_FACEBOOK' , 0);
define('PROVIDER_GOOGLE'   , 1);
define('PROVIDER_TWITTER'  , 2);

/**
 * Define default color config
 */
define('COLOR_CODE_DEFAULT' , '#00FFFF');
define('COLOR_NAME_DEFAULT' , 'Cyan');

/**
 * Define Paginate
 */
define('PAGINATE_NUMBER', 10);
define('PAGINATE_NUMBER_INFINITY', 1000000);

/**
 * Status code
 */
define('STATUS_CODE_SUCCESS', 200);
define('STATUS_CODE_DELETE_SUCCESS', 204);

/**
 * Phone Regex
 */
define('PHONE_CONTACT_REGEX', '/^(\ )*(\+065|\+65|065|65|\(65\)|\(065\)|\(\+65\)|\(\+065\))?(\ ){0,3}([\d]{4}[\s]{0,3}[\d]{4})?$/');
define('PHONE_CONTACT_REGEX_JS', '^(\ )*(\+065|\+65|065|65|\(65\)|\(065\)|\(\+65\)|\(\+065\))?(\ ){0,3}([\d]{4}[\s]{0,3}[\d]{4})?$');

/**
 * Messages
 */
define('MESSAGE_PHONE_INVALID', 'The phone format is invalid. Correct examples: (+065) 1234 5678 or (65) 1234 5678 or 1234 5678');

define('MESSAGE_SKU_NUMBER_DUPLICATE', 'The SKU Number has already been taken. Please change first 3 character of primary code or re-order first color to build unique SKU Number');

// define('MESSAGE_TRANSFER_QUANTITY_GREATER_BALANCE', 'Transfer error! Quantity can\'t greater than store balance.');
// define('MESSAGE_TRANSFER_QUANTITY_GREATER_BALANCE', 'Transfer error! Quantity can\'t greater than store balance.');

define('MESSAGE_ERROR_GENERAL'         , 'Something wrong is happending...');
define('MESSAGE_ERROR_API_GENERAL'     , 'Server Error. Something wrong is happending...');

define('MESSAGE_API_SUCCESS'           , 'Success !');
define('MESSAGE_API_DELETE_SUCCESS'    , 'Delete Success !');
define('MESSAGE_API_PRODUCT_NOT_EXIST' , 'Product not exist ! ');
define('MESSAGE_API_USER_NOT_EXIST'    , 'User not exist ! ');
define('MESSAGE_API_USER_NOT_AUTHORITY', 'Server error. User not authority!');

/**
 * Length of string to generate image name
 */
define('IMAGE_RANDOM_CHARACTER_LENGTH' , 10);

/**
 * Define status show toast message
 */
define('SHOW_ERROR_TOAST_MESSAGE'   , 0);
define('SHOW_WARNING_TOAST_MESSAGE' , 1);
define('SHOW_SUCCESS_TOAST_MESSAGE' , 2);

/**
 * Define return type image data after save/update image
 * (in event update)
 */
define('RETURN_TYPE_SKU_NUMBER' , 1);
define('RETURN_TYPE_NAME'       , 2);
define('RETURN_TYPE_ID'         , 3);
define('RETURN_TYPE_OBJECT'     , 4);

/**
 * Define Push status
 */
define('PUSH_STATUS_PENDING' , 0);
define('PUSH_STATUS_PUSHED'  , 1);
// define('PUSH_STATUS_FAIL'    , 2);

define('WAIVED_PRICE' , 'WAIVED');

define('ROLE_DEFAULT' , 3); //LOGISTIC
define('TEAM_DEFAULT' , 4); //Other

define('MESSAGE_NOTIFICATION' , 1); //Other
define('ORDER_NOTIFICATION'   , 0); //Other
define('ARTICLE_LEGNTH'       , 120); //length of content for show
//link show file off module realtime message
define('SERVICE_SYMLINK' , '/images/designs');

/**
 * Define exception code when throw exception
 */
define('EXCEPTION_CODE_CUSTOMER_NOT_AUTH' , 845);

/**
 * Define Assign status in Thread (Ticket)
 * Open/Close
 */
define('ASSIGN_STATUS_OPEN'  , 0);
define('ASSIGN_STATUS_CLOSE' , 1);

define('ASSIGN_FOR_TEAM' , 1);
define('ASSIGN_FOR_USER' , 0);

/**
 * Define helper tutorial
 * (For customer in Frontend)
 */
define('SHOW_HELPER_TOUR' , 0);
define('HIDE_HELPER_TOUR' , 1);

/**
 * Define soccer type
 */
define('TYPE_NORMAL' , 0);
define('TYPE_SOCCER' , 1);

/**
 * Define default config for shipping method
 */
define('DEFAULT_SHIPPING_METHOD_ID'	  , 3);
define('DEFAULT_SHIPPING_METHOD_NAME' , 'Free');

/**
 * Customer Has purchase or not
 */
define('CUSTOMER_NO_PURCHASE'  , 0);
define('CUSTOMER_HAS_PURCHASE' , 1);

/**
 * Define order status is visible with customer
 */
define('ORDER_STATUS_VISIBLE_WITH_CUSTOMER'   , true);
define('ORDER_STATUS_INVISIBLE_WITH_CUSTOMER' , false);

