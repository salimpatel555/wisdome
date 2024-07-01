<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details Form</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: #ffffff; /* White background for form */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Soft shadow */
            padding: 30px;
            margin-top: 30px;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: #333333;
            margin-bottom: 30px;
        }

        .form-control {
            border-radius: 5px; /* Rounded form inputs */
        }

        .btn-primary {
            background-color: #007bff; /* Blue primary button */
            border-color: #007bff;
            border-radius: 5px;
        }

        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="form-container">
                <h2 class="form-title mb-4 my-3">Personal Details</h2>
                <form action="submit_personal_details.php" method="post">
                    <!-- Name and Email Row -->
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
						<div class="form-group col-md-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
						<div class="form-group col-md-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>

                    <!-- Mobile Numbers Row -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="mobile">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" name="mobile" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone">Alternate Mobile Number</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>

                    <!-- Address Row -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <!-- City, State, Zip Code Row -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zip">Zip Code</label>
                            <input type="text" class="form-control" id="zip" name="zip" required>
                        </div>
                    </div>

                    <!-- Country Row -->
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" required>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
