<div class="total">
    <div class="container">
        <div class="left">
            <h1>Yeni Şikayət</h1>
            <ul>
                <li class="contact-step">
                    <span class="number">1</span>
                    <span>Əlaqə Məlumatı</span>
                    <div class="number-line"></div>
                </li>
                <li>
                    <span class="number">2</span>
                    <span>Hadisə Haqqında Məlumat</span>
                    <div class="number-line"></div>
                </li>
                <li>
                    <span class="number">3</span>
                    <span>Şikayətin Detalları</span>
                    <div class="number-line"></div>
                </li>
                <li>
                    <span class="number">4</span>
                    <span>Sənədlər və Göndəriş</span>
                </li>
            </ul>
        </div>
        <div class="right">
            <div class="exit-container">
                <img src="<?= base_url() ?>assets/images/exit.svg" alt="">
            </div>
            <div class="main">
                <div class="line-container">
                    <div class="line"></div>
                    <div class="percentage"></div>
                </div>  
                <div class="content-container show" id="contact">
                    <div class="first">
                        <h1>Əlaqə Məlumatlarınız</h1>
                        <p>Zəhmət olmasa, sizinlə əlaqə saxlaya bilməyimiz üçün əsas şəxsi məlumatlarınızı daxil edin.</p>
                        <div class="form">
                            <div class="input-container gap">
                                <label for="name">Ad <span class="error-msg-inline"></span></label>
                                <input type="text" placeholder="Ad" id="name">
                            </div>
                            <div class="input-container">
                                <label for="surname">Soyad <span class="error-msg-inline"></span></label>
                                <input type="text" placeholder="Soyad" id="surname">
                            </div>
                            <div class="input-container gap">
                                <label for="mobile">Telefon nömrəsi <span class="error-msg-inline"></span></label>
                                <input type="text" placeholder="Telefon nömrəsi" id="mobile">
                            </div>
                            <div class="input-container">
                                <label for="email">E-mail <span class="error-msg-inline"></span></label>
                                <input type="text" placeholder="E-mail" id="email">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="content-container hidden" id="event">
                    <div class="first">
                        <h1>Hadisə Haqqında Məlumat</h1>
                        <p>Hadisənin harada, nə vaxt və kimlə baş verdiyini qeyd edin.</p>
                        <div class="form">
                            <div class="input-container gap">
                                <label for="location">Hadisənin yeri <span class="error-msg-inline"></span></label>
                                <input type="text" placeholder="Yer" id="location">
                            </div>
                            <div class="input-container">
                                <label for="date">Hadisənin tarixi <span class="error-msg-inline"></span></label>
                                <input type="date" placeholder="Date" id="date">
                            </div>
                            <div class="input-container gap">
                                <label for="mobile">Saat aralığı <span class="error-msg-inline"></span></label>
                                <input type="text" placeholder="Saat" id="hour">
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="content-container hidden" id="complaint">
                    <div class="first">
                        <h1>Şikayətin Detalları</h1>
                        <p class="add-text">Zəhmət olmasa, şikayətinizin detallarını daxil edin.</p>
                        <div class="form">
                            <div class="input-container textarea">
                                <label for="complaint">Şikayət detalları <span class="error-msg-inline"></span></label>
                                <textarea rows="7" placeholder="Detallar" id="complaintDetails"></textarea>
                            </div>
                            <div class="input-container textarea">
                                <label for="complaint">İştirak edən şəxslər, vəzifələri <span class="error-msg-inline"></span></label>
                                <textarea rows="7" placeholder="Detallar" id="people"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-container hidden" id="file">
                    <div class="first">
                            <h1>Sənədlər</h1>
                            <div class="form">
                            <label class="upload-area" id="uploadLabel">
                                <div class="upload-icon">📁</div>
                                <span>Zəhmət olmasa, əlavə edə biləcəyiniz sənəd, şəkil, video və səs materiallarını daxil edin</span>
                                <br>
                                <strong style="color:#1e40af;">Klikləyin və ya faylları bura atın</strong>
                                <input type="file" id="fileInput" multiple>
                            </label>
                            
                            <ul class="file-list" id="fileList"></ul>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="ex"><img src="<?= base_url() ?>assets/images/ex.svg" alt="ex"></div>
                    <button class="complete-button disabled">Təsdiqlə</button>
                    <div class="next"><img src="<?= base_url() ?>assets/images/next.svg" alt="next"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="overlay">
  <div class="modal">
    <p class="modal-title">Anonim Şikayət Seçimi</p>
    <p class="modal-text">
      Əgər anonim qalmaq istəyirsinizsə, əlaqə məlumatlarınızı doldurmaq məcburi deyil.
      Anonim şikayət verdiyiniz zaman şəxsi məlumatlarınız qeyd olunmayacaq və məxfiliyiniz qorunacaq.
    </p>
    <div class="modal-actions">
      <button class="outline-button">Məlumat daxil et</button>
      <button class="filled-button">Anonim davam et</button>
    </div>
  </div>
</div>
