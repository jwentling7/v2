<?php get_header(  ); ?>

<main>

<?php get_template_part( 'template-parts/pageBanner' ); ?>

<section class="section">
    <div class="container container--boxed ">
        <?php the_content(  ); ?>
        <h2 class="title title--medium-large section__header">Lets Work Together!</h2>
        <p class="contact__info">Feel free to use the contact form below, or email me directly at <a href="">wentingjessica@gmail.com</a>.</p>

        <div id="respond" class="contact-form">
            <?php if($_POST['submitted'] == 'true') {
                $sent = wp_mail( 'wentlingjessica@gmail.com', 'This is the subject!!', 'this message!!!', 'this header!!');
                if($sent) { echo $sent; } else { echo 'it no worked'; }
            } ?>
            <form action="<?php the_permalink( ); ?>" method="POST">
                <p>
                    <label for="message_name">Name: <span class="pink">*</span><br/>
                    <input type="text" id="message_name" name="message_name" placeholder="Name" value="<?php  ?>"></label>
                </p>

                <p>
                    <label for="message_email">Email: <span class="pink">*</span><br/>
                    <input type="text" id="message_email" name="message_email" placeholder="Email" value="<?php  ?>"></label>
                </p>

                <p>
                    <label for="message_text">Message: <span class="pink">*</span><br/>
                    <textarea type="text" id="message_text" name="message_text" placeholder="Type your message here."><?php  ?></textarea></label>
                </p>

                <p class="contact-form__btns">
                    <input type="hidden" name="submitted" value="true">
                    <button name="message_submit" class="btn btn--accent">Send Message</button>
                    <button type="reset" class=" contact-form__btns__reset btn btn--ghost">Clear Form</button>
                </p>
            </form>
        </div>
    </div>
</section>
      
</main>

<?php get_footer(  ); ?>