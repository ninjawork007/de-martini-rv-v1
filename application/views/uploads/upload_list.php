    <h3>Uploads</h3>
    <table class="pure-table">
        <thead>
            <tr>
                <th>Upload</th>
                <th>Type</th>
                <th>Upload URL</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="uploads_list">
            <?php if($vehicle->uploads): ?> 
                <?php foreach($vehicle->uploads as $upload): ?>
                    <?php $this->load->view('uploads/upload_row', array('upload' => $upload, 'type' => 'none')); ?>
                <?php endforeach; ?>
            <?php else: ?>
                <tr id="uploads_empty">
                    <td colspan="4">No Uploads attached. Use dropzone below for uploading.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <br>
