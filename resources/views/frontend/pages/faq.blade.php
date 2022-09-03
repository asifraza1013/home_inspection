@extends('frontend.layouts.layouts')

@section('content')
<section id="page-title" class="text-light" style="background-image: url('{{ asset('frontend/assets/images/site/contact_us_bg.png') }}')">
    <div class="container">
        <div class="page-title">
            <h1 class="bold">FAQ`S</h1>
            <span>Sun Home Inspections.</span>
        </div>
        <div class="breadcrumb">
            <ul>
                <li><a href="{{ route('welcome') }}">Home</a>
                </li>
                <li class="active"><a href="#">FAQs</a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="bold text-dgreen">Frequently Asked Questions</h2>

                <div class="content">
                    <!-- Accordion -->
                    <div class="toggle accordion accordion-shadow">
                        <div class="ac-item">
                            <h5 class="ac-title">How to change your password</h5>
                            <div class="ac-content">
                                <h4 class="bold">After you login and you are on your Dashboard:</h4>
                                <ul>
                                    <li>Go to the Orange Menu on the left and scroll down to User or Inspector, depending on who’s password you want to change.</li>
                                    <li>From the list of Users or Inspectors, click on Edit.</li>
                                    <li>Change your password from here and Save..</li>
                                    <li>Next time you login you will have to use the new Password you just created.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title">How to add a new User or Inspector</h5>
                            <div class="ac-content">
                                <p class="bold">After you login and you are on your Dashboard, go to the Orange Menu on the left and scroll down to User or Inspector. On either list there is a Create New button on the upper right in the blue bar. Click on it. This opens a User or Inspector Entry page.:</p>
                                <p class="mt-2">You do not have to fill in all of the fields. The ones you have to are:</p>
                                <ul>
                                    <li>First Name</li>
                                    <li>Last Name</li>
                                    <li>Display Name</li>
                                    <li>Email Address</li>
                                    <li>And Access Info. Which is the information needed for this person to login to the program. Make sure you write down the Password and keep it somewhere safe.</li>
                                    <li>PS. License & Certification info will show up on the report, if you decide to fill in these fields.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title">How to remove an Inspector</h5>
                            <div class="ac-content">
                                <p class="bold">After you login and you are on your Dashboard:</p>
                                <ul>
                                    <li>Go to the Orange Menu on the left and scroll down to User or Inspector.</li>
                                    <li>Click Edit on the person you want to remove, either from access to the program, like an office person, or to take an Inspector off of the Schedule.</li>
                                    <li>Third box down on the left is Access Info.</li>
                                    <li>Third option is Active / Inactive.</li>
                                    <li>To remove them unclick Active.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title">How to edit your Schedule</h5>
                            <div class="ac-content">
                                <p class="bold">If you only want to make yourself available for inspections at certain times each day, like maybe a morning, noon and afternoon time,</p>
                                <ul>
                                    <li>Go to the Preferences tab.</li>
                                    <li>The very first tab in Preferences is General.</li>
                                    <li>The box on the lower right is Inspection Schedule.</li>
                                    <li>Put in the times you want to show on the Schedule and Save.</li>
                                    <li>Only use military time. For example, 1pm is 1300; 2pm is 1400 and so on.</li>
                                    <li>Do not put any spaces, commas, or anything else other than the times.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title">How to block out an inspector on the Schedule</h5>
                            <div class="ac-content">
                                {{-- <p class="bold">If you only want to make yourself available for inspections at certain times each day, like maybe a morning, noon and afternoon time,</p> --}}
                                <ul>
                                    <li>Go to the Schedule from your Dashboard.</li>
                                    <li>Click on the Inspectors name that you need to block out or schedule off.</li>
                                    <li>A box will pop-up, Edit Time Out.</li>
                                    <li>Plug in the Start Date & End Date, even if it’s for one day or one-time slot. If you are blocking out someone for the whole day, in the Start Time you put the very   first time on your Schedule. Let’s say it’s 8:30.</li>
                                    <li>In the End Time you would put the last time on your Schedule. Let’s say it’s 3:00pm. Save.</li>
                                    <li>Now when you close this box that inspector will be blocked out for the whole day.</li>
                                </ul>
                                <ol>
                                    <li>If you only want to block an inspector out for one or two time slots, you do the exact thing except you would change the times to reflect exactly the slots you want    blocked.</li>
                                    <li>If an inspector needs days off the only thing you change is the End Date, and Save.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title">How to give a discount on an order</h5>
                            <div class="ac-content">
                                {{-- <p class="bold">If you only want to make yourself available for inspections at certain times each day, like maybe a morning, noon and afternoon time,</p> --}}
                                <ul>
                                    <li>This assumes you want the discount to be reflected on the Invoice.</li>
                                    <li>First go to Preferences, click on the Fees tab. In the Add Fee field type Discount. Click Add. Now the Discount box will show up both on the Order Entry page and in    the Quick Quote.</li>
                                    <li>It doesn’t matter if you are scheduling a new Order or if an Order already exists. To create a discount simply add a (-) Minus sign in front of the number you will plug in here. For example, you want to give someone a $25.00 discount, all you need to put in the Discount box is -25, and the Discount will automatically be applied.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title">How to Add & Manage Your Inspection Photos</h5>
                            <div class="ac-content">
                                {{-- <p class="bold">If you only want to make yourself available for inspections at certain times each day, like maybe a morning, noon and afternoon time,</p> --}}
                                <ul>
                                    <li> When you are in a Section where you want to Add any photos, let's use the Roof as an example, on the Line that reflects the photo you want to add, let's say Roof-Condition; you click on the Camera + button to indicate you took a photo. Click twice for two photos and so on.</li>
                                    <li>Each time you take a photo, you want to be sure to indicate it in the related Section, and on the appropriate Line. So if you took two Roof-Condition photos, and one Roof-General View photo, the Roof Section should have a total of 3 photos.</li>
                                    <li>When you are done with the inspection and you've taken all the photos you want, you need to add the photos to the inspection report.</li>
                                    <li>Open up the Tab right next to Inspection Report, Photos Management. </li>
                                    <li>To get the photos into the system, you need to upload them. Click on Upload Photos.</li>
                                    <li>From here you only need to use the Upload tab. Before you can upload your photos you either have to have your camera or memory card plugged into your computer or your camera needs to be connected. You can also move your photos from where they are stored, like your camera onto your desktop. Now, click on Add Files, find your photos and click on Start Upload.</li>
                                    <li> In a matter of seconds (unless you took 100's of pics) your photos will be in the program. When the upload is done you will be moved back to the Photos Management tab.</li>
                                    <li> When in the Photos Management tab, you should now see all of he photos you uploaded. • Simply assign the photos to the corresponding Section, Line, and you are done!
                                        Note: You do not have to use every photo you take, also if you did not click to add a photo in the report, you can always go back and add it, then add the photo.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title">How to start an Inspection Report</h5>
                            <div class="ac-content">
                                <h5 class="bold">You can only start an inspection after you have taken / scheduled an Order:</h5>
                                {{-- <p class="bold">If you only want to make yourself available for inspections at certain times each day, like maybe a morning, noon and afternoon time,</p> --}}
                                <ul>
                                    <li> You can open up an Order from your Dashboard or from your Inspections database, i.e. View All.</li>
                                    <li>Click on the Inspection Order number (IO#) to open the Order.</li>
                                    <li>Open the Inspection Report Tab. </li>
                                    <li>From here you have 2 options.  </li>
                                </ul>
                                <ol>
                                    <li>Start building the bones of your report by Adding a Section one at a time from the Add A Section pull down menu. When you have all of the Sections you need added, SAVE. </li>
                                    <li>Or you can Add a Template from the menu of already created Templates. Click on the one you want and in seconds it will load. SAVE.</li>
                                </ol>
                                <ul>
                                    <li>Remember even if a Template does not exactly fit the home you are inspecting, you can add or delete Sections or Lines as needed.</li>
                                    <li>Now your ready to start your inspection!</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title">How to set up your Fees</h5>
                            <div class="ac-content">
                                {{-- <h5 class="bold">You can only start an inspection after you have taken / scheduled an Order:</h5> --}}
                                {{-- <p class="bold">If you only want to make yourself available for inspections at certain times each day, like maybe a morning, noon and afternoon time,</p> --}}
                                <ul>
                                    <li>Go to Preferences from your Dashboard</li>
                                    <li>Open the Fees tab</li>
                                    <li> In the Add Fee field type in whatever services you charge for one at a time. Like, House, Pool, Pool & Spa, Under house and so on. Then click Add. </li>
                                    <li> After you have created the list of services you charge for click on Choose Fee and pick one of the options. All the Fees are based on Square Feet! So, if you start with the House, we recommend you put 1 in the Display Order. This means it will be the first item that shows up on the Order Entry page, and Quick Quote.</li>
                                    <li>You would use ‘Is it Commissionable’ if you had inspectors that work for you and you pay them a percentage of this fee. If you do choose Yes.</li>
                                    <li>You would use ‘Show on Public Order Form’ if you have On-Line Scheduling set up. If you do, choose Yes, otherwise No.</li>
                                    <li>Fee Schedule, Start field. For the house, if you charge by the size (square feet) put 00 in the first box. Then for End you would put the size cut off for this fee.  Example, if your first tier of fees covers a house that is 0 to 1499 square feet, you would put 0 in the Start box and 1499 in the End box.</li>
                                    <li>Price. Enter the Fee you charge for this first tier. Do not put $ or Cents. Only round numbers.</li>
                                    <li>Now you can move to the next level of Fees. Example the next fee level might cover a house that is 1500 to 2500 square feet.</li>
                                    <li>When you are done, SAVE!</li>
                                    <li>Set up Flat Fees. If you have anything, including a house where you charge a Flat Fee, all you have to do is put 00 in the Start box and 10000 or higher in the End box, then add the Fee. This way no matter the size of the house the Fee will always be the same. You would especially use this on things like, Pool, Termite, Crawl Space etc.</li>
                                    <li>Note. We recommend you set your Fee schedule by putting the services you most use first. You can adjust this anytime.</li>
                                    <li>You can edit, add remove any service at any time. Just always make sure to Save.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="ac-item">
                            <h5 class="ac-title">Quick Quote</h5>
                            <div class="ac-content">
                                {{-- <h5 class="bold">You can only start an inspection after you have taken / scheduled an Order:</h5> --}}
                                {{-- <p class="bold">If you only want to make yourself available for inspections at certain times each day, like maybe a morning, noon and afternoon time,</p> --}}
                                <p>Quick Quote is a reflection of the Fee schedule you have on the Order Entry page.</p>
                                <p>When a client calls in for a quote you can quickly get them a price.</p>
                                <p>When they choose to move forward and Schedule the inspection, click Save Quote.</p>
                                <p>This way the information you put into the Quick Quote will automatically show up on the Order Entry page.</p>
                            </div>
                        </div>
                    </div>
                    <!-- end: Accordion -->
                    <div class="line"></div>
                </div>
            </div>
            <div class="col-lg-5">
                <img src="{{ asset('frontend/assets/images/site/faq.png') }}" alt="" class="img-fluid m-b-40 w-75" style="border: 2px solid #0A2FB6">
            </div>
        </div>
    </div>
</section>
@endsection
