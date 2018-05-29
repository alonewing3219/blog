<style>
<!--
.button {
    background-color: #008CBA; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

-->
</style>


<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">管理者</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
<body background=https://www.smartordersystem.com/images/banner_1_en_bg.png style="font-size:30px;">
<form id="from" method="post" name="myform" action="manager" >
<?php echo e(csrf_field()); ?>

<label type="text"  style="background-color:#77DDFF;">*開會日期</label>
<input style="font-size:30px;" type="date" name="meeting_time" required="required" 
	min="<?php echo date ("y-m-d",strtotime("-1months"));?>"
	max="<?php echo date ("y-m-d",strtotime("+1months"));?>">
<br>
<br>
<label type="text"  style="background-color:#77DDFF;">*截止時間</label>
<input style="font-size:30px;" type="date" name="deadline" required="required"
	min="<?php echo date ("y-m-d",strtotime("-1months"));?>"
	max="<?php echo date ("y-m-d",strtotime("+1months"));?>">
<br>
<br>
    <div id="info">
          <p id="info_start">
            Click on the microphone icon and begin speaking for as long as you like.
          </p>
          <p id="info_speak_now" style="display:none">
            Speak now.
          </p>
          <p id="info_no_speech" style="display:none">
            No speech was detected. You may need to adjust your <a href=
            "//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">microphone
            settings</a>.
          </p>
          <p id="info_no_microphone" style="display:none">
            No microphone was found. Ensure that a microphone is installed and that
            <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
            microphone settings</a> are configured correctly.
          </p>
          <p id="info_allow" style="display:none">
            Click the "Allow" button above to enable your microphone.
          </p>
          <p id="info_denied" style="display:none">
            Permission to use microphone was denied.
          </p>
          <p id="info_blocked" style="display:none">
            Permission to use microphone is blocked. To change, go to
            chrome://settings/contentExceptions#media-stream
          </p>
          <p id="info_upgrade" style="display:none">
            Web Speech API is not supported by this browser. Upgrade to <a href=
            "//www.google.com/chrome">Chrome</a> version 25 or later.
          </p>
    </div>
    <div id="div_start">
          <button id="start_button" onclick="startButton(event)"><img alt="Start" id="start_img" style="display: inline-block;" width="20"
          src='https://lh3.googleusercontent.com/NJzd6skbk09Ejhq30qK3r8hyR_02oUNKULMmQ4AXkC4M4j0pW9syAe7OVvNgqekUB2g=w300'i></button>
    </div>
    <div id="results">
          <span class="final" id="final_span"></span> 
          <span class="interim" id="interim_span"></span>
     </div>
     <div id="copy">
          <button class="button" id="copy_button" onclick="copyButton()" style="display: none;">Copy and Paste</button>
          <div id="copy_info" style="display: none;">
            <p>
              Press Control-C to copy text.
            </p>
            <p>
              (Command-C on Mac.)
            </p>
          </div><button class="button" id="email_button" onclick="emailButton()" style="display: none;">Create
          Email</button>
          <div id="email_info" style="display: none;">
            <p>
              Text sent to default email application.
            </p>
            <p>
              (See chrome://settings/handlers to change.)
            </p>
          </div>
    </div>
    <div class="compact marquee" id="div_language">
          <select id="select_language" onchange="updateCountry()"></select>&nbsp;&nbsp;
          <select id="select_dialect"></select>
    </div>

<label>開會地點</label>
<input class="final" id="final_span" type="text" name="place">
<br>
<br>
<label>開會主題</label>
<input type="text" name="topic">
<br>
<br>

選擇餐廳
<select style="font-size:30px;" name="store" id="store">
<option value="">Default</option>
<?php if(count($storelist) > 0): ?>

    <?php $__currentLoopData = $storelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <option value="<?php echo e($list->name); ?>"> <?php echo e($list->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?> 
    nothing

<?php endif; ?>
</select>         
<ol style="font-size:30px;" name="food" id="food">
<li value="">Default</li>
</ol>

<div class="row">
<?php if(count($storelist) > 0): ?>

    <?php $__currentLoopData = $storelist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-12 col-md-4">
	<button type="submit" id="btn_smb" ><img src="<?php echo e($list->picture); ?>"  class="img-thumbnail" title="<?php echo e($list->name); ?>">
    </div>

<!--    <div class="col-6 col-md-4">
	<img src="https://attach.setn.com/newsimages/2014/09/07/137796-XXL.jpg"  class="img-thumbnail">
    </div>
    <div class="col-12 col-md-4">
	<img src="http://pic.pimg.tw/peko721/1392451133-4164702776.jpg"  class="img-thumbnail">
    </div>
--!>

   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php else: ?> 
    nothing

<?php endif; ?>

</div>
<input class="button" type="submit" id="btn_smb"  value="選擇餐點囉">
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $.ajaxSetup({ headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')} });

    $(document).on('change', '#store', function(event){
      event.preventDefault();
      if($('select#store option:selected').val() == '')
      {
        $('#food').children().remove();
        $('#food').append('<li value="">Default</li>');
        return false;
      }
      $.ajax({
          url: "/getFoodList",
          type: 'post',
          data: {
            text1: $('select#store option:selected').val() 
          },
	  success: function( result ) {
            //alert(result); 
            $('#food').children().remove();
            for(var key in result)
            {
              //alert(result[key]['thing']);
              $('#food').append('<li value="' + result[key]['thing'] + '">' + result[key]['thing'] + '</li>');
            } 
          }
      });
    });


});



</script>
</body> 


                </div>
            </div>
        </div>
    </div>
</div>
<script src="/intl/en/chrome/assets/common/js/chrome.min.js"></script>

    <script>
    // If you modify this array, also update default language / dialect below.
    var langs =
    [['Afrikaans',       ['af-ZA']],
    ['አማርኛ',           ['am-ET']],
    ['Azərbaycanca',    ['az-AZ']],
    ['বাংলা',            ['bn-BD', 'বাংলাদেশ'],
    ['bn-IN', 'ভারত']],
    ['Bahasa Indonesia',['id-ID']],
    ['Bahasa Melayu',   ['ms-MY']],
    ['Català',          ['ca-ES']],
    ['Čeština',         ['cs-CZ']],
    ['Dansk',           ['da-DK']],
    ['Deutsch',         ['de-DE']],
    ['English',         ['en-AU', 'Australia'],
    ['en-CA', 'Canada'],
    ['en-IN', 'India'],
    ['en-KE', 'Kenya'],
    ['en-TZ', 'Tanzania'],
    ['en-GH', 'Ghana'],
    ['en-NZ', 'New Zealand'],
    ['en-NG', 'Nigeria'],
    ['en-ZA', 'South Africa'],
    ['en-PH', 'Philippines'],
    ['en-GB', 'United Kingdom'],
    ['en-US', 'United States']],
    ['Español',         ['es-AR', 'Argentina'],
    ['es-BO', 'Bolivia'],
    ['es-CL', 'Chile'],
    ['es-CO', 'Colombia'],
    ['es-CR', 'Costa Rica'],
    ['es-EC', 'Ecuador'],
    ['es-SV', 'El Salvador'],
    ['es-ES', 'España'],
    ['es-US', 'Estados Unidos'],
    ['es-GT', 'Guatemala'],
    ['es-HN', 'Honduras'],
    ['es-MX', 'México'],
    ['es-NI', 'Nicaragua'],
    ['es-PA', 'Panamá'],
    ['es-PY', 'Paraguay'],
    ['es-PE', 'Perú'],
    ['es-PR', 'Puerto Rico'],
    ['es-DO', 'República Dominicana'],
    ['es-UY', 'Uruguay'],
    ['es-VE', 'Venezuela']],
    ['Euskara',         ['eu-ES']],
    ['Filipino',        ['fil-PH']],
['Français',        ['fr-FR']],
 ['Basa Jawa',       ['jv-ID']],
 ['Galego',          ['gl-ES']],
 ['ગુજરાતી',           ['gu-IN']],
 ['Hrvatski',        ['hr-HR']],
 ['IsiZulu',         ['zu-ZA']],
 ['Íslenska',        ['is-IS']],
 ['Italiano',        ['it-IT', 'Italia'],
                     ['it-CH', 'Svizzera']],
 ['ಕನ್ನಡ',             ['kn-IN']],
 ['ភាសាខ្មែរ',          ['km-KH']],
 ['Latviešu',        ['lv-LV']],
 ['Lietuvių',        ['lt-LT']],
 ['മലയാളം',          ['ml-IN']],
 ['मराठी',             ['mr-IN']],
 ['Magyar',          ['hu-HU']],
 ['ລາວ',              ['lo-LA']],
 ['Nederlands',      ['nl-NL']],
 ['नेपाली भाषा',        ['ne-NP']],
 ['Norsk bokmål',    ['nb-NO']],
 ['Polski',          ['pl-PL']],
 ['Português',       ['pt-BR', 'Brasil'],
                     ['pt-PT', 'Portugal']],
 ['Română',          ['ro-RO']],
 ['සිංහල',          ['si-LK']],
 ['Slovenščina',     ['sl-SI']],
 ['Basa Sunda',      ['su-ID']],
 ['Slovenčina',      ['sk-SK']],
 ['Suomi',           ['fi-FI']],
 ['Svenska',         ['sv-SE']],
 ['Kiswahili',       ['sw-TZ', 'Tanzania'],
                     ['sw-KE', 'Kenya']],
 ['ქართული',       ['ka-GE']],
 ['Հայերեն',          ['hy-AM']],
 ['தமிழ்',            ['ta-IN', 'இந்தியா'],
                     ['ta-SG', 'சிங்கப்பூர்'],
                     ['ta-LK', 'இலங்கை'],
                     ['ta-MY', 'மலேசியா']],
 ['తెలుగు',           ['te-IN']],
 ['Tiếng Việt',      ['vi-VN']],
 ['Türkçe',          ['tr-TR']],
 ['اُردُو',            ['ur-PK', 'پاکستان'],
                     ['ur-IN', 'بھارت']],
 ['Ελληνικά',         ['el-GR']],
 ['български',         ['bg-BG']],
 ['Pусский',          ['ru-RU']],
 ['Српски',           ['sr-RS']],
 ['Українська',        ['uk-UA']],
 ['한국어',            ['ko-KR']],
 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                     ['cmn-Hans-HK', '普通话 (香港)'],
                     ['cmn-Hant-TW', '中文 (台灣)'],
                     ['yue-Hant-HK', '粵語 (香港)']],
 ['日本語',           ['ja-JP']],
 ['हिन्दी',             ['hi-IN']],
 ['ภาษาไทย',         ['th-TH']]];

for (var i = 0; i < langs.length; i++) {
  select_language.options[i] = new Option(langs[i][0], i);
}
// Set default language / dialect.
select_language.selectedIndex = 10;
updateCountry();
select_dialect.selectedIndex = 11;
showInfo('info_start');

function updateCountry() {
  for (var i = select_dialect.options.length - 1; i >= 0; i--) {
    select_dialect.remove(i);
  }
  var list = langs[select_language.selectedIndex];
  for (var i = 1; i < list.length; i++) {
    select_dialect.options.add(new Option(list[i][1], list[i][0]));
  }
  select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
}

var create_email = false;
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
if (!('webkitSpeechRecognition' in window)) {
  upgrade();
} else {
  start_button.style.display = 'inline-block';
  var recognition = new webkitSpeechRecognition();
  recognition.continuous = true;
  recognition.interimResults = true;

  recognition.onstart = function() {
    recognizing = true;
    showInfo('info_speak_now');
    start_img.src = '/intl/en/chrome/assets/common/images/content/mic-animate.gif';
  };

  recognition.onerror = function(event) {
    if (event.error == 'no-speech') {
      start_img.src = '/intl/en/chrome/assets/common/images/content/mic.gif';
      showInfo('info_no_speech');
      ignore_onend = true;
    }
    if (event.error == 'audio-capture') {
      start_img.src = '/intl/en/chrome/assets/common/images/content/mic.gif';
      showInfo('info_no_microphone');
      ignore_onend = true;
    }
    if (event.error == 'not-allowed') {
      if (event.timeStamp - start_timestamp < 100) {
        showInfo('info_blocked');
      } else {
        showInfo('info_denied');
      }
      ignore_onend = true;
    }
  };

  recognition.onend = function() {
    recognizing = false;
    if (ignore_onend) {
      return;
    }
    start_img.src = '/intl/en/chrome/assets/common/images/content/mic.gif';
    if (!final_transcript) {
      showInfo('info_start');
      return;
    }
    showInfo('');
    if (window.getSelection) {
      window.getSelection().removeAllRanges();
      var range = document.createRange();
      range.selectNode(document.getElementById('final_span'));
      window.getSelection().addRange(range);
    }
    if (create_email) {
      create_email = false;
      createEmail();
    }
  };

  recognition.onresult = function(event) {
    var interim_transcript = '';
    if (typeof(event.results) == 'undefined') {
      recognition.onend = null;
      recognition.stop();
      upgrade();
      return;
    }
    for (var i = event.resultIndex; i < event.results.length; ++i) {
      if (event.results[i].isFinal) {
        final_transcript += event.results[i][0].transcript;
      } else {
        interim_transcript += event.results[i][0].transcript;
      }
    }
    final_transcript = capitalize(final_transcript);
    final_span.innerHTML = linebreak(final_transcript);
    interim_span.innerHTML = linebreak(interim_transcript);
    if (final_transcript || interim_transcript) {
      showButtons('inline-block');
    }
  };
}

function upgrade() {
  start_button.style.visibility = 'hidden';
  showInfo('info_upgrade');
}

var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

var first_char = /\S/;
function capitalize(s) {
  return s.replace(first_char, function(m) { return m.toUpperCase(); });
}

function createEmail() {
  var n = final_transcript.indexOf('\n');
  if (n < 0 || n >= 80) {
    n = 40 + final_transcript.substring(40).indexOf(' ');
  }
  var subject = encodeURI(final_transcript.substring(0, n));
  var body = encodeURI(final_transcript.substring(n + 1));
  window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
}

function copyButton() {
  if (recognizing) {
    recognizing = false;
    recognition.stop();
  }
  copy_button.style.display = 'none';
  copy_info.style.display = 'inline-block';
  showInfo('');
}

function emailButton() {
  if (recognizing) {
    create_email = true;
    recognizing = false;
    recognition.stop();
  } else {
    createEmail();
  }
  email_button.style.display = 'none';
  email_info.style.display = 'inline-block';
  showInfo('');
}

function startButton(event) {
  if (recognizing) {
    recognition.stop();
    return;
  }
  final_transcript = '';
  recognition.lang = select_dialect.value;
  recognition.start();
  ignore_onend = false;
  final_span.innerHTML = '';
  interim_span.innerHTML = '';
  start_img.src = '/intl/en/chrome/assets/common/images/content/mic-slash.gif';
  showInfo('info_allow');
  showButtons('none');
  start_timestamp = event.timeStamp;
}

function showInfo(s) {
  if (s) {
    for (var child = info.firstChild; child; child = child.nextSibling) {
      if (child.style) {
        child.style.display = child.id == s ? 'inline' : 'none';
      }
    }
    info.style.visibility = 'visible';
  } else {
    info.style.visibility = 'hidden';
  }
}

var current_style;
function showButtons(style) {
  if (style == current_style) {
    return;
  }
  current_style = style;
  copy_button.style.display = style;
  email_button.style.display = style;
  copy_info.style.display = 'none';
  email_info.style.display = 'none';
}
    </script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>