<?php
Route::get('sms', function () {
    $number = '+923135525556';
    $nexmo = Nexmo::insights()->basic($number);
    if ($nexmo['status'] == 0) {
        try {
            $sms = Nexmo::message()->send([
                'to' => '+123123123123',
                'from' => config('app.name', 'Laravel'),
                'text' => 'Using the facade to send a message.'
            ]);
            dd($sms);
        } catch (Nexmo\Client\Exception\Request $e) {
            dd($e);
        }
    } else {
        echo 'not valid number';
    }
});
Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['as' => '/', 'uses' => 'UserController@home']);
    Route::get('/login', ['as' => 'login', 'uses' => 'UserController@loginViewform']);
    Route::post('logedin', ['as' => 'logedin', 'uses' => 'UserController@UserloggedIn']);
    Route::get('/signup', ['as' => 'signup', 'uses' => 'UserController@signupViewform']);
    Route::post('/register', ['as' => 'register', 'uses' => 'UserController@signupUserByPhone']);
    Route::get('/signup-phone', ['as' => 'signup-phone', 'uses' => 'UserController@signupViewPhoneform']);
    Route::get('/forgot-what', ['as' => 'forgot-what', 'uses' => 'UserController@userForgotWhat']);
    Route::get('/forgot-username', ['as' => 'forgot-username', 'uses' => 'UserController@userForgotUsername']);
    Route::post('/send-username', ['as' => 'send-username', 'uses' => 'UserController@userSendUsername']);


    // Authentication Routes...
    /*Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm' ]);
    Route::post('login', [ 'as' => '', 'uses' => 'Auth\LoginController@login']);
    Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout' ]);*/

    // Password Reset Routes...
    Route::post('password/email', ['as' => 'password.email', 'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail']);
    Route::get('password/reset', ['as' => 'password.request', 'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm']);
    Route::post('password/reset', ['as' => '', 'uses' => 'Auth\ResetPasswordController@reset']);
    Route::get('password/reset/{token}', ['as' => 'password.reset', 'uses' => 'Auth\ResetPasswordController@showResetForm']);


    // Phone Verify
    Route::get('/verify', 'VerifyController@show')->name('verify');
    Route::post('/verify', 'VerifyController@verify')->name('verify');

    Route::post('/credit-card-info', ['as' => 'credit-card-info', 'uses' => 'UserController@signupCreditCard']);

    // Registration Routes...
    /*Route::get('register', [ 'as' => 'register', 'uses' => 'Auth\RegisterController@showRegistrationForm' ]);
    Route::post('register', [ 'as' => '', 'uses' => 'Auth\RegisterController@register' ]);*/

});


Route::get('/signup-credit-card-info', ['as' => 'signup-credit-card-info', 'uses' => 'UserController@signupCreditCardInfo']);


Route::group(['middleware' => ['web']], function () {

    // Admin Login Routes
    Route::get('/admin-login', ['as' => 'admin-login', 'uses' => 'AdminController@loginViewform']);
    Route::post('/admin-loggedin', ['as' => 'admin-loggedin', 'uses' => 'AdminController@adminLoggedIn']);

});


// Admin Routes
Route::group(['middleware' => ['auth']], function () {

    Route::get('/admin-dashboard', ['as' => 'admin-dashboard', 'uses' => 'AdminController@adminDashbaordView']);
    Route::get('/admin-users', ['as' => 'admin-users', 'uses' => 'AdminController@adminDashbaordAllUsers']);

    Route::get('/admin-users-payment', ['as' => 'admin-users-payment', 'uses' => 'AdminController@adminuserspayment']);

    Route::get('/admin-homepage-questions', ['as' => 'admin-homepage-questions', 'uses' => 'AdminController@adminHomePageQuestions']);
    Route::post('/admin-update-questions', ['as' => 'admin-update-questions', 'uses' => 'AdminController@adminUpdateQuestions']);

    Route::get('/admin-user-view/{id}', ['as' => 'admin-user-view', 'uses' => 'AdminController@adminDashbaordUserProView']);
    Route::get('/refund_amount/{id}', ['as' => 'refund_amount', 'uses' => 'AdminController@refund_amount']);


    Route::get('/admin-user-edit/{id}', ['as' => 'admin-user-edit', 'uses' => 'AdminController@adminDashbaordUserEdits']);
    Route::post('/user-update-profile', ['as' => 'user-update-profile', 'uses' => 'AdminController@userProfileUpdate']);
    Route::get('/admin-user-delete/{id}', ['as' => 'admin-user-delete', 'uses' => 'AdminController@adminDashbaordUserDelete']);
    Route::get('/admin-products', ['as' => 'admin-products', 'uses' => 'ProductController@adminDashbaordAllproducts']);
    Route::get('/admin-new-products', ['as' => 'admin-new-products', 'uses' => 'AdminController@adminNewproducts']);
    Route::get('/admin-edit-products/{id}', ['as' => 'admin-edit-products', 'uses' => 'ProductController@adminProductsEdit']);
    Route::get('/admin-auction-products/{id}', ['as' => 'admin-auction-products', 'uses' => 'ProductController@adminProductsAuction']);

    Route::get('/unsubsctibe_user/{id}', ['as' => 'unsubsctibe_user', 'uses' => 'AdminController@unsubsctibe_user']);
    Route::get('/subsctibe_user/{id}', ['as' => 'subsctibe_user', 'uses' => 'AdminController@subsctibe_user']);


    Route::post('/admin-update-products', ['as' => 'admin-update-products', 'uses' => 'ProductController@adminProductsUpdated']);
    Route::get('/admin-del-products/{id}', ['as' => 'admin-del-products', 'uses' => 'ProductController@adminProductsDel']);
    Route::post('/admin-inserted-products', ['as' => 'admin-inserted-products', 'uses' => 'ProductController@productInsert']);
    Route::get('/import-export', ['as' => 'import-export', 'uses' => 'ExcelsController@importExport']);
    Route::post('/import-excel', ['as' => 'import-excel', 'uses' => 'ExcelsController@importExcel']);

    Route::get('/admin-profile', ['as' => 'admin-profile', 'uses' => 'AdminController@adminProfiles']);
    Route::post('/admin-profile-update', ['as' => 'admin-profile-update', 'uses' => 'AdminController@adminProfileUpdate']);
    Route::get('/admin-change-password', ['as' => 'admin-change-password', 'uses' => 'AdminController@passwordchange']);
    Route::post('/admin-password-update', ['as' => 'admin-password-update', 'uses' => 'AdminController@passwordchangeReset']);
    Route::get('signout', ['as' => 'signout', 'uses' => 'AdminController@getSignOut']);

    Route::post('/admin-selected-group', ['as' => 'admin-selected-group', 'uses' => 'AdminController@adminSelectedGroup']);
    Route::get('/admin-send-group', ['as' => 'admin-send-group', 'uses' => 'AdminController@adminSendGroup']);
    Route::post('/admin-submit-group-message', ['as' => 'admin-submit-group-message', 'uses' => 'AdminController@adminSubmitGroupMessage']);

    Route::get('/admin-contact-messages', ['as' => 'admin-contact-messages', 'uses' => 'ContactController@ContactMessagesView']);
    Route::get('/admin-contact-del/{id}', ['as' => 'admin-contact-del', 'uses' => 'ContactController@ContactMessagesDelete']);
    Route::get('/admin-contact-reply/{id}', ['as' => 'admin-contact-reply', 'uses' => 'ContactController@ContactMessagesReply']);
    Route::post('/admin-contact-send-email', ['as' => 'admin-contact-send-email', 'uses' => 'ContactController@ContactMessagesSendEmail']);

    Route::get('/admin-trial-days', ['as' => 'admin-trial-days', 'uses' => 'AdminController@adminTrialDays']);
    Route::post('/admin-update-trial-days', ['as' => 'admin-update-trial-days', 'uses' => 'AdminController@adminUpdateTrialDays']);

    Route::get('/admin-trial-amount', ['as' => 'admin-trial-amount', 'uses' => 'AdminController@adminTrialAmount']);
    Route::post('/admin-update-trial-amount', ['as' => 'admin-update-trial-amount', 'uses' => 'AdminController@adminUpdateTrialAmount']);

    Route::get('/admin-legals', ['as' => 'admin-legals', 'uses' => 'AdminController@adminLegals']);
    Route::post('/admin-update-legals', ['as' => 'admin-update-legals', 'uses' => 'AdminController@adminUpdateLegals']);

    Route::get('/admin-auction-date', ['as' => 'admin-auction-date', 'uses' => 'AdminController@adminAuctionDate']);
    Route::post('/admin-update-auction-date', ['as' => 'admin-update-auction-date', 'uses' => 'AdminController@adminUpdateAuctionDate']);
});

//Auth::routes();


// User Routes
Route::group(['middleware' => ['auth']], function () {

    //Route::get('/search-view', ['as'=>'search-view', 'uses' => 'ProductController@productSearchResults']);

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'UserController@UserDashbaordMainView']);
    Route::get('/property-near-me', ['as' => 'property-near-me', 'uses' => 'UserController@UserDashbaordView']);
    Route::get('/products/{id}', ['as' => 'products', 'uses' => 'UserController@singleProductView']);
    Route::get('/products-views/{id}', ['as' => 'products-views', 'uses' => 'UserController@singleProductViewDetails']);
    Route::get('/favorites', ['as' => 'favorites', 'uses' => 'FavoriteController@favoritesView']);
    Route::get('/export-favorites', ['as' => 'export-favorites', 'uses' => 'FavoriteController@exportFavorites']);
    Route::get('/add-favorite/{id}', ['as' => 'add-favorite', 'uses' => 'FavoriteController@favoriteAddProduct']);
    Route::get('/add-favorite-reload/{id}', ['as' => 'add-favorite-reload', 'uses' => 'FavoriteController@favoriteAddProductReload']);
    Route::get('/subscriptions', ['as' => 'subscriptions', 'uses' => 'SubscriptionController@subscriptionView']);


    Route::get('/unsubscribe', ['as' => 'unsubscribe', 'uses' => 'SubscriptionController@unsubscribe']);
    Route::get('/subscribe', ['as' => 'subscribe', 'uses' => 'SubscriptionController@subscribe']);

    Route::get('/settings', ['as' => 'settings', 'uses' => 'SettingsController@settingsView']);
    Route::get('/legal', ['as' => 'legal', 'uses' => 'LegalsController@legalView']);
    Route::get('/search-results', ['as' => 'search-results', 'uses' => 'SearchController@SearchResultsViewFilter']);
    Route::get('/search-view', ['as' => 'search-view', 'uses' => 'SearchController@productSearchResults']);
    Route::get('/filter-result-view', ['as' => 'filter-result-view', 'uses' => 'SearchController@productFilterSearchResults']);
    Route::get('/filter-precinct-result-view', ['as' => 'filter-precinct-result-view', 'uses' => 'SearchController@productPrecinctFilterSearchResults']);
    Route::get('/custom-filter-view', ['as' => 'custom-filter-view', 'uses' => 'SearchController@productFilterMultiSearchResults']);
    Route::get('/payment-choose', ['as' => 'payment-choose', 'uses' => 'SettingsController@paymentChoosePageView']);

    Route::get('/change-password', ['as' => 'change-password', 'uses' => 'SettingsController@ChangePassViewPage']);
    Route::post('/user-password-update', ['as' => 'user-password-update', 'uses' => 'AdminController@passwordchangeReset']);


    Route::post('/all-alerts', ['as' => 'all-alerts', 'uses' => 'SettingsController@allAlertsSettings']);

    Route::post('/language-chooser', 'LanguageController@changeLanguage');
    Route::post('/language/', ['before' => 'csrf', 'as' => 'language-chooser',
        'uses' => 'LanguageController@changeLanguage']);


    Route::post('/bid-submit', ['as' => 'bid-submit', 'uses' => 'SubscriptionController@SubscriptionBid']);
    Route::post('/bid-update', ['as' => 'bid-update', 'uses' => 'SubscriptionController@todoDataEdit']);
    Route::get('/payment-view', ['as' => 'payment-view', 'uses' => 'PaymentController@paymentPageView']);
    Route::post('/newcard', ['as' => 'new-card', 'uses' => 'PaymentController@addNewCard']);
    Route::get('/removecard/{id}', ['as' => 'removecard', 'uses' => 'PaymentController@removeCard']);

    Route::get('/premium-payment-form', ['as' => 'premium-payment-form', 'uses' => 'PaymentController@paymentPremiumFormView']);
    Route::post('/payment-by-mastercard', ['as' => 'payment-by-mastercard', 'uses' => 'PaymentController@UserPremiumPaymentStripe']);

    Route::post('/contact-messages', ['as' => 'contact-messages', 'uses' => 'ContactController@ContactMessagesPost']);


});


Route::post('/stripewebhook', ['as' => 'stripewebhook', 'uses' => 'PaymentController@stripewebhook']);


Route::get('mail', function () {

    dd(Mail::raw('Testing mail', function ($message) {
        $message->to('yiicakephp@gmail.com');
    }));

});



