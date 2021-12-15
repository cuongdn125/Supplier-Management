<div class="container"style="margin-top: 80px" >
    <div class="row align-items-start">
        <div class="col-6">
            <h2>Danh sách nhà vận chuyển</h2>
        </div>
        <div class="col-4">
            <div class="d-flex ">
                <input class="form-control me-2" id="timkiem_nvc"  placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" onclick="timNvc()">Search</button>
            </div>
        </div>
        <div class="col-2">
            <a class="btn btn-outline-primary" data-toggle="modal" data-target="#themNvcModal">Thêm mới</a>
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
       <th width="20%">Email</th>
       <th width="20%">Khu vực</th>
       <th width="20%">Chức năng</th>
      </tr>
     </thead>
     <tbody id="load_nvc">

     </tbody>
    </table>




</div>


<div class="container">
    <canvas id="myChartNvc"></canvas>
</div>

<div class="modal fade" id="themNvcModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm nhà vận chuyển</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="them_nvc_form" method="post">
                <div class="form-group">
                    <label for="ma_nvc">Mã nhà vận chuyển</label>
                    <input type="text" class="form-control" id="ma_nvc" name="ma_nvc" placeholder="Mã nhà vận chuyển">
                </div>
                <div class="form-group">
                    <label for="ten_nvc">Tên nhà vận chuyển</label>
                    <input type="text" class="form-control" id="ten_nvc" name="ten_nvc" placeholder="Tên nhà vận chuyển">
                </div>
                <div class="form-group">
                    <label for="sdt_nvc">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt_nvc" name="sdt_nvc" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="email_nvc">Email</label>
                    <input type="email" class="form-control" id="email_nvc" name="email_nvc" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="khuvuc_nvc">Khu vực</label>
                    <input type="text" class="form-control" id="khuvuc_nvc" name="khuvuc_nvc" placeholder="Khu vực">
                </div>
                <div class="form-group">
                    <label for="anh_nvc">Ảnh</label>
                    <input type="file" class="form-control" id="anh_nvc" name="anh_nvc" >
                </div>

            </form>
        </div>
        <div class="modal-footer d-flex">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button  class="btn btn-primary them_nvc" onclick="themNvc()">Thêm</button>
                </div>
        </div>
    </div>
</div>


<div class="modal fade" id="suaNvcModal" tabindex="-1" role="dialog" aria-labelledby="upexampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="upexampleModalLabel">Cập nhật nhà vận chuyển</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form id="sua_nvc_form" method="post">
                <div class="form-group">
                    <label for="sua_ma_nvc">Mã nhà vận chuyển</label>
                    <input type="text" class="form-control" id="sua_ma_nvc" name="sua_ma_nvc" placeholder="Mã nhà vận chuyển" disabled="disabled">
                </div>
                <div class="form-group">
                    <label for="sua_ten_nvc">Tên nhà vận chuyển</label>
                    <input type="text" class="form-control" id="sua_ten_nvc" name="sua_ten_nvc" placeholder="Tên nhà vận chuyển">
                </div>
                <div class="form-group">
                    <label for="sua_sdt_nvc">Số điện thoại</label>
                    <input type="text" class="form-control" id="sua_sdt_nvc" name="sua_sdt_nvc" placeholder="Số điện thoại">
                </div>
                <div class="form-group">
                    <label for="sua_email_nvc">Email</label>
                    <input type="email" class="form-control" id="sua_email_nvc" name="sua_email_nvc" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="sua_khuvuc_nvc">Khu vực</label>
                    <input type="text" class="form-control" id="sua_khuvuc_nvc" name="sua_khuvuc_nvc" placeholder="Khu vực">
                </div>
                <div class="form-group w-80">
                    <label for="sua_anh_nvc">Ảnh</label>
                    <input type="file" class="form-control" id="sua_anh_nvc" name="sua_anh_nvc" >
                </div>
                <img style="width:80px" src="" alt="anh" id="view_anh_nvc"/>
            </form>
        </div>
        <div class="modal-footer d-flex">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                    <button  class="btn btn-primary sua_nvc" onclick="suaNvc()">Cập nhật</button>
                </div>

        </div>
    </div>
</div>
