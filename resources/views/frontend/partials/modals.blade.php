<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content p-2">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>

      <iframe
        src="//maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q={{ $map_address }}&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"
        height="380" style="border:0; width: 100%;max-height:600px" allowfullscreen="" loading="lazy"></iframe>


    </div>
  </div>
</div>

<div class="modal fade share-event" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4>{{ __('Share Now') }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center p-4">
        <div class="button-group">
          <a href="//www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank">
            <i class="fab fa-facebook-f"></i>
            <p>{{ __('Facebook') }}</p>
          </a>
          <a href="//twitter.com/intent/tweet?text=my share text&amp;url={{ urlencode(url()->current()) }}"
            target="_blank"><i class="fab fa-twitter"></i>
            <p>{{ __('Twitter') }}</p>
          </a>
          <a href="//www.linkedin.com/shareArticle?mini=true&amp;url={{ urlencode(url()->current()) }}&amp;title="
            target="_blank"><i class="fab fa-linkedin"></i>
            <p>{{ __('linkedin') }}</p>
          </a>
        </div>
        <div class="mt-3" style="display: flex; align-items: center; margin-left: 100px;">
            <div class="shortenLinkBtn" style="margin-right: 20px;"> 
                <a href="https://links.hevatickets.com/" target="_blank" data-tooltip="This will copy event link and automatically open a link shortener. Simply paste the copied link and click shorten link!"> 
                    <i class="fas fa-unlink"></i> 
                    <span id="shortenLinkText" class="ml-2">Shorten Link</span> 
                </a>
            </div>
        
            <div class="copyLinkBtn" style="border-left: 1px solid #ccc; padding-left: 20px;"> 
                <i class="far fa-copy"></i> 
                <span id="copyLinkText" class="ml-2 copy-link-text">Copy Link</span>
                <input type="text" id="linkToCopy" value="{{ url()->current() }}" style="opacity: 0; position: absolute; margin-left: 500px;"> 
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    document.getElementById('copyLinkText').addEventListener('click', function() {
        var linkInput = document.getElementById('linkToCopy');
        linkInput.select();
        document.execCommand('copy');
        
        // Optionally, provide feedback to the user (e.g., change the text to "Copied!")
        this.textContent = 'Copied!';
        setTimeout(() => {
            this.textContent = 'Copy Link'; 
        }, 2000); // Reset text after 2 seconds
    });
</script>

<script>
    document.getElementById('shortenLinkText').addEventListener('click', function() {
        var linkInput = document.getElementById('linkToCopy');
        linkInput.select();
        document.execCommand('copy');
        
    });
</script>

<style>
.copy-link-text:hover {
    cursor: pointer;
}

.shortenLinkBtn a[data-tooltip] {
  position: relative; 
}

.shortenLinkBtn a[data-tooltip]:before {
  content: attr(data-tooltip); 
  visibility: hidden; 
  opacity: 0;
  position: absolute;
  top: 100%; 
  left: 50%;
  transform: translateX(-50%);
  background-color: #333; 
  color: #fff; 
  padding: 5px 10px;
  border-radius: 4px;
  font-size: 14px;
  width: 300px;
  text-align: justify;
  transition: opacity 0.2s; /* Add a smooth transition effect */
}

.shortenLinkBtn a[data-tooltip]:hover:before {
  visibility: visible;
  opacity: 1;
}

@media (max-width: 768px) { 
  .mt-3 {
    margin-left: 50px !important; /* Use !important to override inline styles */
  }
}
</style>

