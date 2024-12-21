<h1>Create account</h1>
<form action="" method="post" style="width: 300px; padding: 2em; border: 2px solid red; border-radius: 12px">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label>Firstname</label>
                <input name="firstname" type="text" class="form-control">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label>Lastname</label>
                <input name="lastname" type="text" class="form-control">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input name="email" type="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input name="password" type="password" class="form-control">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Confirm Password</label>
        <input name="passwordconfirm" type="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>