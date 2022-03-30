<!DOCTYPE html>
<html>
    <body>
<div class="container bootstrap snippets bootdey">

    <h1 class="text-primary">Account Information</h1>
    <hr>
    <div class="row">


        <!-- edit form column -->
        <div class="col-md-9 personal-info">


            <i class="fa fa-coffee"></i>
            <h3>Personal info</h3>

            <form class="form-horizontal" role="form">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Full name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text"placeholder="This will show user info when database exists" maxlength="50">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Adress:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="" maxlength="100"placeholder="This will show user info when database exists">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Adress 2:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="" maxlength="100"placeholder="This will show user info when database exists">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">City:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="" maxlength="100"placeholder="This will show user info when database exists">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Zipcode:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text" value="" maxlength="9" minlength="5" onkeypress="return event.charCode != 32"placeholder="This will show user info when database exists">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">State:</label>
                    <div class="col-lg-8">
                        <div class="ui-select">
                            <input class="form-control" type="text" value="" maxlength="9" minlength="5" onkeypress="return event.charCode != 32" placeholder="This will show user info when database exists">

                        </div>
                    </div>
                </div>
                <input onclick="window.location.href='Account.html'" type="button" value="Edit">


            </form>
        </div>
    </div>
</div>
<hr>
</body>
</html>