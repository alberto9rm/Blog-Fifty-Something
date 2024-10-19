<?php include('header.php'); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
<div class="container">
    <div class="contact__wrapper shadow-lg mt-n9 mt-4">
        <div class="row no-gutters">
            <div class="col-lg-5  p-5 order-lg-2 bg-info" style="color:white;font-family:tahoma;">
                <h3 class="color--white mb-5">Get in Touch</h3>
    
                <ul class="contact-info__list list-style--none position-relative z-index-101">
                    <li class="mb-4 pl-4">
                        <span class="position-absolute"><i class="fas fa-envelope"></i></span> &nbsp;&nbsp;&nbsp;&nbsp; albertormspecial@gmail.com
                    </li>
                    <li class="mb-4 pl-4">
                        <span class="position-absolute"><i class="fas fa-phone"></i></span>&nbsp;&nbsp;&nbsp;&nbsp; +34 600 00 00 00
                    </li>
                    <li class="mb-4 pl-4">
                        <span class="position-absolute"><i class="fas fa-map-marker-alt"></i></span>&nbsp;&nbsp;&nbsp;&nbsp; alberto9rm
                        <br> &nbsp;&nbsp;Málaga, Spain                     
                       </li>
                </ul>
            </div>
            <div style="display: flex;justify-content: center;">
                <?php if(isset($_GET['error'])): ?>
                    <p><?php echo htmlentities($_GET['error']) ;?></p>
                    <?php endif; ?>
        </div>
        <div style="display: flex;justify-content: center;">
                <?php if(isset($_GET['success'])): ?>
                    <p><?php echo htmlentities($_GET['success']) ;?></p>
                    <?php endif; ?>
        </div>
    
            <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1">
                <p>ll fields are required and must be filled out</p>
                <form action="procesa_contact.php" class="contact-form form-validate" novalidate="novalidate"
                            method="post">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="firstName">Users</label>
                                <input type="text" class="form-control" id="firstName" name="users" placeholder="Users">
                            </div>
                        </div>
    
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="lastName">Name</label>
                                <input type="email" class="form-control" id="lastName" name="name" placeholder="Name">
                            </div>
                        </div>
    
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="correo@example.com">
                            </div>
                        </div>
    
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" placeholder="+34 600 00 00 00">
                            </div>
                        </div>
    
                        <div class="col-sm-12 mb-3">
                            <div class="form-group">
                                <label class="required-field" for="message">How can we help?</label>
                                <textarea class="form-control" id="message" name="message_form" rows="4" placeholder="Hi there, I would like to....."></textarea>
                            </div>
                        </div>
    
                        <div class="col-sm-12 mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                        </div>
    
                    </div>
                </form>
            </div>
            <!-- End Contact Form Wrapper -->
    
        </div>
    </div>
</div>
<footer class="py-0 bg-black mt-3">
            <div class="md-3"><p class="m-1 text-center text-white" style="font-family: Tahoma;font-size: 20px;">Copyright &copy; alberto9rm</p></div>
        </footer>