<?php $__env->startSection('content'); ?>

    <style>
    #info {
    font-size: 20px;
    }
    #div_start {
    float: right;
    }
    #headline {
    text-decoration: none;
    }
    #results {
    font-size: 14px;
    font-weight: bold;
    border: 1px solid #ddd;
    padding: 15px;
    text-align: left;
    min-height: 150px;
    }
    #start_button {
    border: 0;
    background-color:transparent;
    padding: 0;
    }
    .interim {
    color: gray;
    }
    .final {
    color: black;
    padding-right: 3px;
    }
    .button {
    display: none;
    }
    .marquee {
    margin: 20px auto;
    }

    #buttons {
    margin: 10px 0;
    position: relative;
    top: -50px;
    }

    #copy {
    margin-top: 20px;
    }

    #copy > div {
    display: none;
    margin: 0 70px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/login">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" required autofocus>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
<div class="or-box">
                    <div class="row">
                        <div class="col-md-12 row-block">
                            <a href="<?php echo e(url('/google')); ?>" class="btn btn-lg btn-danger btn-block">
                                <strong>Login With Google</strong>
                            </a>
                        </div>
                    </div>
                </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="#">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
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
		start_img.src = 'https://lh3.googleusercontent.com/NJzd6skbk09Ejhq30qK3r8hyR_02oUNKULMmQ4AXkC4M4j0pW9syAe7OVvNgqekUB2g=w300';
	};

	recognition.onerror = function(event) {
		if (event.error == 'no-speech') {
			start_img.src = 'https://lh3.googleusercontent.com/NJzd6skbk09Ejhq30qK3r8hyR_02oUNKULMmQ4AXkC4M4j0pW9syAe7OVvNgqekUB2g=w300';
			showInfo('info_no_speech');
			ignore_onend = true;
		}
		if (event.error == 'audio-capture') {
			start_img.src = 'https://lh3.googleusercontent.com/NJzd6skbk09Ejhq30qK3r8hyR_02oUNKULMmQ4AXkC4M4j0pW9syAe7OVvNgqekUB2g=w300';
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
		start_img.src = 'https://lh3.googleusercontent.com/NJzd6skbk09Ejhq30qK3r8hyR_02oUNKULMmQ4AXkC4M4j0pW9syAe7OVvNgqekUB2g=w300';
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
	start_img.src = 'https://lh3.googleusercontent.com/NJzd6skbk09Ejhq30qK3r8hyR_02oUNKULMmQ4AXkC4M4j0pW9syAe7OVvNgqekUB2g=w300';
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