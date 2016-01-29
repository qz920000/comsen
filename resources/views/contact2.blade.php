@extends('master')
@section('title', 'Contact Us')
@section('content')



        <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p>Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!</p>
                <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                <form name="sentMessage" id="contactForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Phone Number</label>
                            <input type="tel" class="form-control" placeholder="Phone Number" id="phone" required data-validation-required-message="Please enter your phone number.">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <br>
                    <div id="success"></div>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

        
<div class="container col-md-8 col-md-offset-2">
<div class="well well bs-component">
    
        <form class="form-horizontal" method="post">
            @foreach ($errors->all() as $error)
            <p class="alert alert-danger">{{ $error }}</p>
            @endforeach

        @if (session('status'))
        <div class="alert alert-success">
        {{ session('status') }}
        </div>
        @endif
  
<input type="hidden" name="_token" value="{!! csrf_token() !!}">
<fieldset>
<legend>Contact Us</legend>
<div class="form-group">
<label for="name" class="col-lg-2 control-label">Name</label>
<div class="col-lg-10">
    <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="{{ old('name') }}">
</div>
</div>

<div class="form-group">
<label for="email" class="col-lg-2 control-label">Email</label>
<div class="col-lg-10">
    <input type="text" class="form-control" id="email" placeholder="Email" name="email"value="{{ old('email') }}">
</div>
</div>

<div class="form-group">
<label for="subject" class="col-lg-2 control-label">Subject</label>
<div class="col-lg-10">
    <input type="text" class="form-control" id="subject" placeholder="Subject" name="subject" value="{{ old('subject') }}">
</div>
</div>


<div class="form-group">
<label for="content" class="col-lg-2 control-label ">Message</label>
<div class="col-lg-10">
    <textarea class="form-control" rows="3" id="content" name="content" value="{{ old('content') }}"></textarea>
              <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
            
<span class="help-block"></span>
</div>
</div>
<div class="form-group">
<div class="col-lg-10 col-lg-offset-2">
    <button type = "reset" class="btn btn-default">Cancel</button>
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>

<div class="col-lg-10 col-lg-offset-2">
    Call us at this numebr: 800 number
</div>

<div class="col-lg-10 col-lg-offset-2">
  You can email us at this number
</div>
</fieldset>
</form>
</div>
</div>
@endsection