<br />
<div class="row">
    <?php if ($this->session->userdata('user_name')) { ?>
        <h2>Welcome <?php echo $this->session->userdata('user_name'); ?>, You are successfully logged in.</h2>
    <?php } else { ?>
        <h2>Welcome, You are successfully logged in.</h2>
    <?php } ?>
    <div class="col-sm-4">
        <a class="btn btn-danger" href="<?=base_url().'login/logout';?>">Logout</a>
    </div>
</div>
