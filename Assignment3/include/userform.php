<h2>USER INFORMATION</h2>
<dl class="user-form">
    <!-- name -->
    <dt data-name="user-form-name">
        <span>NAME</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["name"] ?>
        </span>
    </dt>
    <dd>
        <input placeholder="Full name" type="text" name="user-form-name" id="user-form-name"
            value="<?php echo $grocery->post_info["name"] ?>">
    </dd>
    <!-- phone -->
    <dt data-name="user-form-phone">
        <span>PHONE NUMBER</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["phone"] ?>
        </span>
    </dt>
    <dd>
        <input placeholder="e.g. 604-690-4016" type="text" name="user-form-phone" id="user-form-phone"
            value="<?php echo $grocery->post_info["phone"] ?>">
    </dd>
    <!-- email -->
    <dt data-name="user-form-email">
        <span>EMAIL</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["email"] ?>
        </span>
    </dt>
    <dd>
        <input placeholder="e.g. sliu9412@conestogac.on.ca" type="text" name="user-form-email" id="user-form-email"
            value="<?php echo $grocery->post_info["email"] ?>">
    </dd>
    <!-- password -->
    <dt data-name="user-form-password">
        <span>PASSWORD</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["password"] ?>
        </span>
    </dt>
    <dd>
        <input type="password" name="user-form-password" id="user-form-password"
            value="<?php echo $grocery->post_info["password"] ?>">
    </dd>
    <!-- confirm password -->
    <dt data-name="user-form-confirm-password">
        <span>CONFIRM PASSWORD</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["confirm_password"] ?>
        </span>
    </dt>
    <dd>
        <input type="password" name="user-form-confirm-password" id="user-form-confirm-password"
            value="<?php echo $grocery->post_info["confirm_password"] ?>">
    </dd>
</dl>
<h2>LOCATION</h2>
<dl class="user-form">
    <!-- post code -->
    <dt data-name="user-form-post-code">
        <span>POST CODE</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["postcode"] ?>
        </span>
    </dt>
    <dd>
        <input placeholder="e.g. N2L3V5" type="text" name="user-form-post-code" id="user-form-post-code"
            value="<?php echo $grocery->post_info["postcode"] ?>">
    </dd>
    <!-- address -->
    <dt data-name="user-form-address">
        <span>ADDRESS</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["address"] ?>
        </span>
    </dt>
    <dd>
        <input placeholder="e.g. University Avenue" type="text" name="user-form-address" id="user-form-address"
            value="<?php echo $grocery->post_info["address"] ?>">
    </dd>
    <!-- city -->
    <dt data-name="user-form-city">
        <span>CITY</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["city"] ?>
        </span>
    </dt>
    <dd>
        <input placeholder="e.g. Waterloo" type="text" name="user-form-city" id="user-form-city"
            value="<?php echo $grocery->post_info["city"] ?>">
    </dd>
    <!-- province -->
    <dt data-name="user-form-province">
        <span>PROVINCE/Territory</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["province"] ?>
        </span>
    </dt>
    <dd>
        <select name="user-form-province" id="user-form-province">
            <?php echo $grocery->Generate_Province_Tax() ?>
        </select>
    </dd>
</dl>
<h2>PAYMENT</h2>
<dl class="user-form">
    <!-- credit card number -->
    <dt data-name="user-form-card-number">
        <span>CARD NUMBER</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["card_number"] ?>
        </span>
    </dt>
    <dd>
        <input placeholder="e.g. 4111-1111-1111-1111" type="text" name="user-form-card-number"
            id="user-form-card-number" value="<?php echo $grocery->post_info["card_number"] ?>">
    </dd>
    <!-- credit card expiry year -->
    <dt data-name="user-form-card-expiry-year">
        <span>CARD EXPIRY YEAR</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["card_expiry_year"] ?>
        </span>
    </dt>
    <dd>
        <input placeholder="e.g. 2025" type="text" name="user-form-card-expiry-year" id="user-form-card-expiry-year"
            value="<?php echo $grocery->post_info["card_expiry_year"] ?>">
    </dd>
    <!-- credit card expiry month -->
    <dt data-name="user-form-card-expiry-month">
        <span>CARD EXPIRY MONTH</span>
        <span class="error-message">
            <?php echo $grocery->error_messages["card_expiry_month"] ?>
        </span>
    </dt>
    <dd>
        <input placeholder="e.g. FEB" type="text" name="user-form-card-expiry-month" id="user-form-card-expiry-month"
            value="<?php echo $grocery->post_info["card_expiry_month"] ?>">
    </dd>
</dl>