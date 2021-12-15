<?php
    include '../../database.php';
    $sql = 'SELECT * FROM Nhacungcap';
    $result = mysqli_query($conn, $sql);
    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $count++;
?>
    <tr>
        <td>
            <?php echo $count; ?>
        </td>
        <td>
            <img style="width: 100%" src="<?php echo $row['img']?>" alt="anh"/>
        </td>
        <td><?php echo $row['ma']; ?></td>
        <td><?php echo $row['ten']; ?></td>
        <td><?php echo $row['sdt']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['diachi']; ?></td>
        <td><?php echo $row['nhom']; ?></td>
        <td>
            <button type="button" class="btn btn-danger xoa_ncc" onclick="xoaNcc('<?php echo $row['ma'];?>')">Xoá</button>
            <button type="button"
                data-toggle="modal"
                data-target="#upexampleModal"
                class="btn btn-warning sua_ncc"
                onclick="getNcc('<?php echo $row['ma'];?>')"
                >
                    Sửa
            </button>
        </td>
    </tr>
    <?php
    }
    ?>