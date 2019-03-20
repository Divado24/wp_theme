<?php 

/*
Template Name: Contact Page Template
*/

get_header();

?>


<div class="container content">

<?php
if (email_contact_form()) {
    $success = '<div class=" alert alert-success col-sm-offset-2">Message sent! I\'ll get back to you as soon as possible</div>'; // Success Message
};
?>

    <div id="contact">
        <?php echo $success ?>
        <form role='form' class="form-horizontal" method="POST" action=''>
            <div class="form-group">
                <label for="contactname" class="control-label col-sm-2">Name: </label>
                <div class="col-sm-10">
                    <input id="contactname" name="contactname" type="text" class="form-control" required autofocus>
                </div>
             </div>
            <div class="form-group">
                <label for="company" class="control-label col-sm-2">Company: </label>
                <div class="col-sm-10">
                    <input id="company" name="company" type="text" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="control-label col-sm-2">Email: </label>
                <div class="col-sm-10">
                     <input id="email" name="email" type="email" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="message" class="control-label col-sm-2">Message: </label>
                <div class="col-sm-10">
                    <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button class="btn btn-default" name="submit" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php 
get_footer();
?>