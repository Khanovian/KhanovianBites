<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <style>
    body {
    background: rgb(0, 255, 255)
    
    }
    
    .form-control:focus {
    box-shadow: none;border-color: #ff0000
    
    }

    .profile-button {
    background: rgb(0, 183, 255);
    box-shadow: none;border: none
}

    .profile-button:hover {
    background: #ff0000
    }

    .profile-button:focus {
    background: #ff0000;box-shadow: none
    }

    .profile-button:active {
    background: #ff0000;box-shadow: none
    }

    .back:hover {
    color: blue;cursor: pointer
    }

    .labels {
    font-size: 11px
    }

    .add-experience:hover {
    background: #ff0000;color: #fff;cursor: pointer;border: solid 1px #c9530f
    }

    </style>
</head>
<body>
    <div class="container rounded bg-white mt-5 mb-5"> 
        <div class="row"> <div class="col-md-3 border-right"> 
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" src="img/undraw_profile_1.svg">
                <span class="font-weight-bold">Amelly</span>
                <span class="text-black-50">amelly12@bbb.com</span>
                <span>
                    <input type="file" accept="image/*" id="profile-image-input" style="display: none;">
            <label for="profile-image-input" class="btn btn-link">Upload Profile Image</label>
                </span>
             </div> 
             
            </div>
             
                <div class="col border-right"> 
                    <div class="p-3 py-5"> 
                        <div class="d-flex justify-content-between align-items-center mb-3"> 
                            <h4 class="text-right">Profile Settings</h4> 
                        
                        </div> 
                        <div class="row mt-2">
                        <form> 
                            <div class="col-md-12">
                                <label class="labels">Name</label>
                                <input type="text" class="form-control" placeholder="First Name" value=""></div> 

                                <div class="col-md-12"><label class="labels">Surname</label>
                                <input type="text" class="form-control" value="" placeholder="Surname"></div> 
                                </div> 

                                <div class="row mt-3"> <div class="col-md-12">
                                <label class="labels">PhoneNumber</label>
                                <input type="text" class="form-control" placeholder="Enter Phone Number" value="">
                                </div> 
                                
                                <div class="col-md-12">
                                <label class="labels">Address</label>
                                <input type="text" class="form-control" placeholder="Enter Address" value="">
                                </div> 
                                
                                <div class="col-md-12">
                                <label class="labels">Email ID</label>
                                <input type="text" class="form-control" placeholder="Enter Email ID" value="">
                                </div> 
                                
                                <div class="col-md-12"><label class="labels">Education</label>
                                <input type="text" class="form-control" placeholder="Education" value="">
                                    </div> 
                            </div> 

                            <div class="row mt-3"> <div class="col-md-6">
                                <label class="labels">Country</label>
                                <input type="text" class="form-control" placeholder="Country" value="">
                            </div> 

                            <div class="col-md-6">
                                <label class="labels">State/Region</label>
                                <input type="text" class="form-control" value="" placeholder="State">
                                
                            </div> 
                          </div>
                        </form>

                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="button">Save Profile</button>
                        </div> 
                    </div> 
                </div> 
                </div>
</div>
</div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const profileImageInput = document.getElementById("profile-image-input");
        const profileImage = document.getElementById("profile-image");
    
        profileImageInput.addEventListener("change", function(event) {
            const selectedImage = event.target.files[0];
            if (selectedImage) {
                const imageUrl = URL.createObjectURL(selectedImage);
                profileImage.src = imageUrl;
            }
        });
    });
    </script>
</body>
</html>