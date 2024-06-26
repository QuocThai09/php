<?php
require_once 'config/connect.php';

try {
    $stm = $pdo->query('SELECT * FROM tbl_nguoidung ORDER BY tbl_nguoidung.id_nguoidung');
    $data = $stm->fetchAll(PDO::FETCH_OBJ);
    $i = 1;

    if ($stm->rowCount() > 0) {
        ?>
        <table class="styled-table" style="width: 1140px; margin-left: 50px; table-layout: fixed;">
            <thead>
                <tr>
                    <th style="text-align: center;">STT</th>
                    <th style="text-align: center;">Mã người dùng</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th style="text-align: center;">Email</th>
                    <th style="text-align: center;">Tài khoản</th>
                    <th>Mật khẩu</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody style="height: 470px; overflow: auto; width: 100%;">
                <?php
                foreach ($data as $item) {
                    $rowClass = ($i % 2 != 0) ? '' : ' class="active-row"';
                    ?>
                    <tr<?php echo $rowClass; ?>>
                        <td style="text-align: center;"><?php echo htmlspecialchars($i); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($item->id_nguoidung); ?></td>
                        <td style="font-family:Arial, Helvetica, sans-serif;"><?php echo htmlspecialchars($item->hoten); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($item->ngaysinh); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($item->email); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($item->taikhoan); ?></td>
                        <td style="text-align: center;"><?php echo htmlspecialchars($item->matkhau); ?></td>
                        <td style="text-align: center;">
                            <a href="edit_taikhoan.php?id_nguoidung=<?php echo htmlspecialchars($item->id_nguoidung); ?>">
                                <svg width="30" height="30" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7 6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1h-2a1 1 0 1 1 0-2h2a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a3 3 0 0 1 3-3h2a1 1 0 0 1 0 2H7Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M8 12a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M8 16a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a onclick="return confirm('Bạn có muốn xóa tài khoản này không???');" href="delete_taikhoan.php?id_nguoidung=<?php echo htmlspecialchars($item->id_nguoidung); ?>">
                                <svg width="30" height="30" fill="#dd2727" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M14 11a1 1 0 0 1 1 1v5a1 1 0 1 1-2 0v-5a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h16a1 1 0 1 1 0 2H4a1 1 0 0 1-1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M6 9a1 1 0 0 1 1 1v8a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-8a1 1 0 1 1 2 0v8a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4v-8a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                                    <path fill-rule="evenodd" d="M8 5a3 3 0 0 1 3-3h2a3 3 0 0 1 3 3v2a1 1 0 0 1-1 1H9a1 1 0 0 1-1-1V5Zm3-1a1 1 0 0 0-1 1v1h4V5a1 1 0 0 0-1-1h-2Z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php
                    $i++;
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No users found in the database.";
    }
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
}
?>
z