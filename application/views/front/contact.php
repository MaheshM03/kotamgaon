<section class="section section-height-1 bg-primary border-0 m-15">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-7 text-right text-lg-start mb-4 mb-lg-0">
                <h3 class="text-color-light text-transform-none text-5 line-height-2 line-height-lg-1 mb-1">
                    संपर्क माहिती
                </h3>
            </div>
        </div>
    </div>
</section>

<div class="main" role="main">
    <div class="container my-5 pt-4">
        <div class="row mb-5">
            <div class="col-lg-12">

                <h2 class="mb-4"><?php echo $setting->title;?> , <?php echo $setting->address;?></h2>

                <ul class="list-unstyled contact-info">
                    <li><strong>फोन:</strong> <?php echo $setting->phone;?></li>
                    <li><strong>ईमेल:</strong> 
                        <a href="mailto:<?php echo $setting->email;?>"><?php echo $setting->email;?></a>
                    </li>
                </ul>

               

                <h3 class="mt-4 mb-3">नकाशा</h3>
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d222.54260901765895!2d73.6976!3d20.1327!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sin!4v1759813719214!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </div>
</div>


