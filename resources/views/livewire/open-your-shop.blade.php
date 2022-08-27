<div>
        <!--main area-->
        <main id="main" class="main-site left-sidebar">
        
        <div class="container">
        
        <div class="wrap-breadcrumb">
        <ul>
            <li class="item-link"><a href="#" class="link">home</a></li>
            <li class="item-link"><span>Register as seller</span></li>
        </ul>
        </div>
        <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
            <div class=" main-content-area">
                <div class="wrap-login-item ">
                    <div class="register-form form-item ">
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                        @endif
                        <form class="form-stl" wire:submit.prevent="registerShop" >
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Open Your Shop</h3>
                                <h4 class="form-subtitle">Shop Infomation</h4>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-reg-lname">Shop Name*</label>
                                <input type="text" id="frm-reg-lname" placeholder="Enter Shop Name*" required wire:model="name">
                            </fieldset>
                            <fieldset class="wrap-title">
                                <h3 class="form-title">Other Information</h3>
                            </fieldset>
                            <fieldset class="wrap-input">
                                <label for="frm-reg-lname">Description*</label>
                                <input type="text" id="frm-reg-lname" placeholder="Shop Description" required wire:model="description">
                            </fieldset>
                            <input type="submit" class="btn btn-sign" value="Register" name="register">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
        
        </div>
        
        </main>
        
</div>
