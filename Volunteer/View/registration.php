

<html>
    <head>
        <title> Volunteer Registration </title>
    </head>

    <body>
        <fieldset>
        
        <legend><h2>Volunteer Registration</h2></legend>
        <form action="../Control/registration_volunteer_control.php" method="post" enctype="multipart/form-data" onsubmit="return validation()">
            <table>
                
                <tr>
                    <td><h4> First Name:</h4></td>
                    <td><h4><input type="text" name="VLN_Firstname" id="VLN_Firstname"></h4></td>
                    <td><h4 id="firsterror"></h4></td>
                </tr>

                <tr>
                    <td><h4> Last Name:</h4></td>
                    <td><h4><input type="text" name="VLN_Lastname" id="VLN_Lastname" ></h4></td>
                    <td><h4 id="lasterror"></h4></td>
                </tr>

                <tr>
                    <td><h4> Password:</h4></td>
                    <td><h4><input type="password" name="VLN_password" id= "VLN_password" >
                    <input type="checkbox" id="showPassword"> Show Password</h4></td>
                    <td><h4 id="passerror"></h4></td>
                </tr>

                <tr>
                    <td><h4> Gender:</h4></td>
                    <td><h4><input type="radio" name="VLN_Gender" id="VLN_Gender"value="Male">Male
                    <input type="radio" name="VLN_Gender" value="Female">Female
                    <input type="radio" name="VLN_Gender" value="Others">Others
                </h4></td>
                <td><h4 id="genderError"></td>
                </tr>

                <tr>
                    <td><h4>Date of Brith:</h4></td>
                    <td><h4><input type="date" name="VLN_dob"id="VLN_dob" value="VLN_dob"> </h4></td>
                    <td><h4 id="dateError"></h4></td>
                </tr>

                <tr>

                    <td><h4>NID:</h4></td>
                    <td><h4><input type="number" name="VLN_NID" id= "VLN_NID"></h4></td>
                    <td><h4 id="niderror"></h4></td>

                </tr>

                <tr>
                    <td><h4>Mobile Number:</h4></td>
                    <td><h4><input type="tel" name="VLN_phone"id="VLN_phone" > </h4></td>
                    <td><h4 id="phoneError"></h4></td>
                </tr>

                <tr>
                    <td><h4>Gmail:</h4></td>
                    <td><h4><input type="email" name="VLN_email" id="VLN_email"> </h4></td>
                    <td><h4 id="emailError"></h4></td>
                </tr>


                <tr>
            <td><h4>Division:</h4></td>
            <td>
                <h4>
                    <select name="Division" id="divisionSelect">
                        <option value="none">Select Division</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Barishal">Barishal</option>
                        <option value="Chattogram">Chattogram</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Rangpur">Rangpur</option>
                    </select>
                </h4>
            </td>
            <td><h4 id="divisionerror"></h4></td>

            </tr>
            <tr>
            <td><h4>District:</h4></td>
            <td>
                <h4>
                    <select name="District" id="districtSelect">
                        <option value="none">Select District</option>
                        <optgroup label="Dhaka">
                            <option value="Dhaka">Dhaka</option>
                            <option value="Faridpur">Faridpur</option>
                            <option value="Gazipur">Gazipur</option>
                            <option value="Gopalganj">Gopalganj</option>
                            <option value="Kishoreganj">Kishoreganj</option>
                            <option value="Madaripur">Madaripur</option>
                            <option value="Manikganj">Manikganj</option>
                            <option value="Munshiganj">Munshiganj</option>
                            <option value="Narayanganj">Narayanganj</option>
                            <option value="Narsingdi">Narsingdi</option>
                            <option value="Rajbari">Rajbari</option>
                            <option value="Shariatpur">Shariatpur</option>
                            <option value="Tangail">Tangail</option>
                        </optgroup>
                        <optgroup label="Chattogram">
                            <option value="Brahmanbaria">Brahmanbaria</option>
                            <option value="Comilla">Comilla</option>
                            <option value="Chandpur">Chandpur</option>
                            <option value="Lakshmipur">Lakshmipur</option>
                            <option value="Noakhali">Noakhali</option>
                            <option value="Feni">Feni</option>
                            <option value="Khagrachhari">Khagrachhari</option>
                            <option value="Rangamati">Rangamati</option>
                            <option value="Bandarban">Bandarban</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Cox's Bazar">Cox's Bazar</option>
                        </optgroup>
                        <optgroup label="Barishal">
                            <option value="Barishal">Barishal</option>
                            <option value="Patuakhali">Patuakhali</option>
                            <option value="Bhola">Bhola</option>
                            <option value="Pirojpur">Pirojpur</option>
                            <option value="Barguna">Barguna</option>
                            <option value="Jhalokati">Jhalokati</option>
                        </optgroup>
                        <optgroup label="Khulna">
                            <option value="Khulna">Khulna</option>
                            <option value="Bagherhat">Bagherhat</option>
                            <option value="Satkhira">Satkhira</option>
                            <option value="Jessore">Jessore</option>
                            <option value="Magura">Magura</option>
                            <option value="Jhenaidah">Jhenaidah</option>
                            <option value="Narail">Narail</option>
                            <option value="Kushtia">Kushtia</option>
                            <option value="Chuadanga">Chuadanga</option>
                            <option value="Meherpur">Meherpur</option>
                        </optgroup>
                        <optgroup label="Rajshahi">
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Chapainawabganj">Chapainawabganj</option>
                            <option value="Natore">Natore</option>
                            <option value="Naogaon">Naogaon</option>
                            <option value="Pabna">Pabna</option>
                            <option value="Sirajganj">Sirajganj</option>
                            <option value="Bogra">Bogra</option>
                            <option value="Joypurhat">Joypurhat</option>
                        </optgroup>
                        <optgroup label="Rangpur">
                            <option value="Rangpur">Rangpur</option>
                            <option value="Gaibandha">Gaibandha</option>
                            <option value="Nilphamari">Nilphamari</option>
                            <option value="Kurigram">Kurigram</option>
                            <option value="Lalmonirhat">Lalmonirhat</option>
                            <option value="Dinajpur">Dinajpur</option>
                            <option value="Thakurgaon">Thakurgaon</option>
                            <option value="Panchagarh">Panchagarh</option>
                        </optgroup>
                        <optgroup label="Mymensingh">
                            <option value="Mymensingh">Mymensingh</option>
                            <option value="Jamalpur">Jamalpur</option>
                            <option value="Netrokona">Netrokona</option>
                            <option value="Sherpur">Sherpur</option>
                        </optgroup>
                        <optgroup label="Sylhet">
                            <option value="Habiganj">Habiganj</option>
                            <option value="Moulvibazar">Moulvibazar</option>
                            <option value="Sunamganj">Sunamganj</option>
                            <option value="Sylhet">Sylhet</option>
                        </optgroup>
                    </select>
                </h4>
            </td>
            <td><h4 id="districterror"></h4></td>
            </tr>

              <tr>
                    <td><h4> Work Time:</h4></td>
                    <td><h4><input type="radio" name="VLN_Work" id="VLN_Work"value="Anytime">Any Time
                    <input type="radio" name="VLN_Work" value="9-12">9-12
                    <input type="radio" name="VLN_Work" value="1-5">1-5
                    <input type="radio" name="VLN_Work" value="Atnight">At Night
                    <input type="radio" name="VLN_Work" value="Others">Others
                </h4></td>
                <td><h4 id="workError"></td>
                </tr>

                <tr>

               <td><h4>Profile Picture: </h4></td>
               <td><h4><input type="file" name="VLN_pic"  id= "VLN_pic" accept=".jpg, .png, .jpeg" ></h4></td>
                <td><h4 id="temppicerror"></h4></td>

             </tr>
               
                <tr>
                    <td><h4>CV:</h4></td>
                
                    <td><h4><input type="file" name="VLN_cv" id="VLN_cv" value="VLN_cv" accept=".pdf"></h4></td>
                    <td><h4 id="cvError"></h4></td>
                </tr>

                <tr>
                    <td></td>
                <td><input type="submit" value="Registration">
                    <input type="reset" value="Reset"></td>
                    
                </tr>

                

                <tr>
                    <td></td>
                    <td><h4><a href="login.php">Go to Login Page</a></h4></td>
                </tr>
                
                
            </table>
            </form>
        </fieldset>
        <script src="../JS/volunteer_reg.js"></script> 
    </body>
</html>