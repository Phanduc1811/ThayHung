<div class="container" style="margin-top: 3em;">
    <div style="display: flex; justify-content: center; align-items: center;">
        <p class="text-uppercase" style="font-size: 20pt; font-weight: bold;">giỏ hàng</p>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data as $d) {
            ?>
                <tr>
                    <th scope="row"> <?php echo $d['idProduct'] ?></th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
            <?php
            }
            ?>

        </tbody>
    </table>
</div>