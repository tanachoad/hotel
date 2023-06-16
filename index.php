<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>customer list</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>

    <!-- Add New User Modal Start -->
    <div class="modal fade" tabindex="-1" id="addNewUserModal">
    <div class="modal-dialog modal-dialog-centerend">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-header">Add New User</h5>
                <button type="buutton" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form id="add-user-form" class="p-2" novalidate>
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" name="username" class="form-control form-control-lg" placeholder="Enter User Name" require>
                            <div class="invalid-feedback">user name is require!</div>
                        </div>
                    </div>
                    <div class="mb-3">
                    <input type="text" name="phone" class="form-control form-control-lg" placeholder="Enter Yours Phone number" require>
                            <div class="invalid-feedback">phone number is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="text" name="room" class="form-control form-control-lg" placeholder="Enter Yours Room" require>
                            <div class="invalid-feedback">room is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="int" name="room_bill" class="form-control form-control-lg" placeholder="Enter Room Bill" require>
                            <div class="invalid-feedback">room bill is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="int" name="electricity_bill" class="form-control form-control-lg" placeholder="Enter Electricity Bill" require>
                            <div class="invalid-feedback">electricity bill is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="int" name="water_bill" class="form-control form-control-lg" placeholder="Enter Water Bill" require>
                            <div class="invalid-feedback">water bill is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="int" name="parking_fee" class="form-control form-control-lg" placeholder="Enter Parking Fee" require>
                            <div class="invalid-feedback">parking fee is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn" placeholder="Enter Parking Fee" require>
                            <div class="invalid-feedback">parking fee is require!</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Add New User Modal end -->

    <!-- Edit User Modal Start -->
    <div class="modal fade" tabindex="-1" id="editUserModal">
    <div class="modal-dialog modal-dialog-centerend">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-header">Edit This User</h5>
                <button type="buutton" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-user-form" class="p-2" novalidate>
                    <input type="hidden" name="id" id="id">
                    <div class="row mb-3 gx-3">
                        <div class="col">
                            <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Enter User Name" require>
                            <div class="invalid-feedback">user name is require!</div>
                        </div>
                    </div>
                    <div class="mb-3">
                    <input type="text" id="phone" name="phone" class="form-control form-control-lg" placeholder="Enter Yours Phone number" require>
                            <div class="invalid-feedback">phone number is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="text" id="room" name="room" class="form-control form-control-lg" placeholder="Enter Yours Room" require>
                            <div class="invalid-feedback">room is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="int" id="room_bill" name="room_bill" class="form-control form-control-lg" placeholder="Enter Room Bill" require>
                            <div class="invalid-feedback">room bill is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="int" id="electricity_bill" name="electricity_bill" class="form-control form-control-lg" placeholder="Enter Electricity Bill" require>
                            <div class="invalid-feedback">electricity bill is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="int" id="water_bill" name="water_bill" class="form-control form-control-lg" placeholder="Enter Water Bill" require>
                            <div class="invalid-feedback">water bill is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="int" id="parking_fee" name="parking_fee" class="form-control form-control-lg" placeholder="Enter Parking Fee" require>
                            <div class="invalid-feedback">parking fee is require!</div>
                    </div>
                    <div class="mb-3">
                    <input type="submit" value="Edit User" class="btn btn-primary btn-block btn-lg" id="edit-user-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- Edit User Modal end -->

    <div class="container">
    <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="text-primary">All users in the databese</h4>
            </div>
            <div>
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#addNewUserModal">Add New User</button>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <div id="showAlert"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped table-boredered text-center">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>ห้องพัก</th>
                            <th>ค่าเช่าห้อง</th>
                            <th>ค่าไฟ</th>
                            <th>ค่าน้ำ</th>
                            <th>ค่าที่จอดรถ</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="main.js"></script>
</body>
</html>