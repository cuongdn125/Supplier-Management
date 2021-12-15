<div class="container"style="margin-top: 80px" >
    <div class="row align-items-start">
        <div class="col-6">
            <h2>Danh sách nhà cung cấp</h2>
        </div>
        <div class="col-4">
            <div class="d-flex ">
                <input class="form-control me-2" id="timkiem_ncc"  placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" onclick="timNcc()">Search</button>
            </div>
        </div>
        <div class="col-2">
            <a class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">Thêm mới</a>
        </div>
    </div>
    <div class="alert alert-success" role="alert" id="noti" style="display: none;">
    </div>
    <br /><br />
    <table id="user_data" class="table table-bordered table-striped">
     <thead>
      <tr>
       <th width="5%">STT</th>
       <th width="5%">Ảnh</th>
       <th width="10%">Mã</th>
       <th width="10%">Tên</th>
       <th width="10%">Số điện thoại</th>
       <th width="15%">Email</th>
       <th width="20%">Địa chỉ</th>
       <th width="10%">Nhóm</th>
       <th width="15%">Chức năng</th>
      </tr>
     </thead>
     <tbody id="load_ncc">

     </tbody>
    </table>




</div>

<div class="container">
    <canvas id="myChart"></canvas>
</div>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm nhà cung cấp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="them_ncc_form" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="ma">Mã nhà cung cấp</label>
                    <input type="text" class="form-control" id="ma" name="ma" placeholder="Mã nhà cung cấp">
                </div>
                <div class="form-group">
                    <label for="ten">Tên nhà cung cấp</label>
                    <input type="text" class="form-control" id="ten" name="ten" placeholder="Tên nhà cung cấp">
                </div>
                <div class="form-group">
                    <label for="sdt">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="diachi">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Địa chỉ">
                </div>
                <div class="form-group">
                    <label for="nhom">Nhóm</label>
                    <input type="text" class="form-control" id="nhom" name="nhom" placeholder="Nhóm">
                </div>
                <div class="form-group">
                    <label for="anh">Ảnh</label>
                    <input type="file" class="form-control" id="anh" name="anh" >
                </div>
            </form>
        </div>
        <div class="modal-footer d-flex">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button  class="btn btn-primary them_ncc" onclick="themNcc()">Thêm</button>
                </div>
        </div>
    </div>
</div>


<div class="modal fade" id="upexampleModal" tabindex="-1" role="dialog" aria-labelledby="upexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="upexampleModalLabel">Cập nhật nhà cung cấp</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="sua_ncc_form" method="post">
                <div class="form-group">
                    <label for="sua_ma">Mã nhà cung cấp</label>
                    <input type="text" class="form-control" id="sua_ma" name="sua_ma" placeholder="Mã nhà cung cấp" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="sua_ten">Tên nhà cung cấp</label>
                    <input type="text" class="form-control" id="sua_ten" name="sua_ten" placeholder="Tên nhà cung cấp">
                </div>
                <div class="form-group">
                    <label for="sua_sdt">Số điện thoại</label>
                    <input type="text" class="form-control" id="sua_sdt" name="sua_sdt" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="sua_email">Email</label>
                    <input type="email" class="form-control" id="sua_email" name="sua_email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="sua_diachi">Địa chỉ</label>
                    <input type="text" class="form-control" id="sua_diachi" name="sua_diachi" placeholder="Địa chỉ">
                </div>
                <div class="form-group">
                    <label for="sua_nhom">Nhóm</label>
                    <input type="text" class="form-control" id="sua_nhom" name="sua_nhom" placeholder="Nhóm">
                </div>
                <div class="form-group w-80">
                    <label for="sua_anh">Ảnh</label>
                    <input type="file" class="form-control" id="sua_anh" name="sua_anh" >
                </div>
                <img style="width:80px" src="" alt="anh" id="view_anh"/>

            </form>
        </div>
        <div class="modal-footer d-flex">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button  class="btn btn-primary sua_ncc" onclick="suaNcc()">Cập nhật</button>
                </div>
        </div>
    </div>
</div>
