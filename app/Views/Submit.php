
  <div class="container">
    <h2>İstifadəçi Məlumatları</h2>
    
    <div class="form-group">
      <label>İstifadəçi adı:
        <span id="username-text"><?= $username ?></span>
        <img src="<?= base_url() ?>assets/images/copy.png" style="cursor: pointer; margin-left: 8px; width: 20px; height: 20px; display: inline;" onclick="copyToClipboard()"></img>
      </label>
    </div>

    <h3>Verilən random istifadəçi adıyla və təyin edəcəyiniz şifrə ilə Ana səhifədən şikayətinizi izləyə bilərsiniz.</h3>
    <div class="form-group">
      <label>Şifrə:</label>
      <input type="password" id="password1">
    </div>

    <div class="form-group">
      <label>Şifrəni təkrar daxil edin:</label>
      <input type="password" id="password2">
    </div>

    <button onclick="submitForm()">Təsdiqlə</button>

    <p id="message"></p>
  </div>


