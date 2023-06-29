<br />
<form action="<?= base_url(); ?>register/doRegister" method="post">
    <h2>Registration</h2>
    <hr />
    <?php if ($this->session->flashdata()) { ?>
        <div class="alert alert-danger">
            <?=$this->session->flashdata('errors'); ?>
        </div>
    <?php } ?>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" required class="form-control" id="name">
    </div>

    <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" name="email" required class="form-control" id="email">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" name="password" required class="form-control" id="pwd">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
    <span class="float-right"><a href="<?= base_url() . 'login'; ?>" class="btn btn-primary">Login</a></span>
</form>
