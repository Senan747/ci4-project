<div class="edit-container">
  <h2 class="edit-title">Complaint Edit</h2>
  <form class="edit-form"  id="responseForm">
    <!-- ID gizli sahə -->
    <input type="hidden" name="id" value="<?= $complaint['id'] ?>">

    <!-- Gösterilən lakin redaktə olunmayan sahələr -->
    <div class="edit-group">
      <label>Name:</label>
      <input type="text" value="<?= $complaint['name'] ?>" readonly class="edit-input" />
    </div>

    <div class="edit-group">
      <label>Surname:</label>
      <input type="text" value="<?= $complaint['surname'] ?>" readonly class="edit-input" />
    </div>

    <div class="edit-group">
      <label>Phone:</label>
      <input type="text" value="<?= $complaint['phone'] ?>" readonly class="edit-input" />
    </div>

    <div class="edit-group">
      <label>Email:</label>
      <input type="text" value="<?= $complaint['email'] ?>" readonly class="edit-input" />
    </div>

    <div class="edit-group">
      <label>Location:</label>
      <input type="text" value="<?= $complaint['location'] ?>" readonly class="edit-input" />
    </div>

    <div class="edit-group">
      <label>Event Date:</label>
      <input type="text" value="<?= $complaint['event_date'] ?>" readonly class="edit-input" />
    </div>

    <div class="edit-group">
      <label>Hours Range:</label>
      <input type="text" value="<?= $complaint['hours_range'] ?>" readonly class="edit-input" />
    </div>

    <div class="edit-group">
      <label>Details:</label>
      <textarea readonly class="edit-textarea"><?= $complaint['complain_details'] ?></textarea>
    </div>

    <div class="edit-group">
      <label>People:</label>
      <textarea readonly class="edit-textarea"><?= $complaint['people'] ?></textarea>
    </div>
    <div class="edit-group">
      <label>Files:</label>
        <?php if (!empty($files) && is_array($files)): ?>
        <?php foreach ($files as $key => $file): ?>
            <div>
                <a href="<?= $file['file_path'] ?>" target="_blank">
                    <?= basename($file['file_path']) ?>
                </a>
            </div>
        <?php endforeach; ?>
        <?php else: ?>
            <p>Fayl tapılmadı.</p>
        <?php endif; ?>
    </div>

    <!-- Editable fields -->
    <div class="edit-group">
      <label>Status:</label>
      <input type="text" name="status" value="<?= $complaint['status'] ?>" class="edit-input" />
    </div>

    <div class="edit-group">
      <label>Response:</label>
      <textarea name="response" class="edit-textarea"><?= $complaint['response'] ?></textarea>
    </div>

    <div class="edit-group">
      <label>Responser:</label>
      <input type="text" name="responser" value="<?= $complaint['responser'] ?>" class="edit-input" />
    </div>

    <div class="edit-buttons">
      <button type="submit" class="edit-save-btn">Save</button>
      <a href="/complaints" class="edit-cancel-btn">Cancel</a>
    </div>
  </form>
</div>