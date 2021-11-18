$('#products').DataTable({
    columnDefs: [{
        targets: 'no-sort',
        orderable: false
    }]
});

var globalFunctions = {};

globalFunctions.ddInput = function(elem) {
if ($(elem).length == 0 || typeof FileReader === "undefined") return;
var $fileupload = $('input[type="file"]');
var noitems = '<li class="no-items"><span class="blue-text underline">Browse</span> or drop here</li>';
var hasitems = '<div class="browse hasitems">Other files to upload? <span class="blue-text underline">Browse</span> or drop here</div>';
var file_list = '<ul class="file-list"></ul>';
var rmv = '<div class="remove"><i class="icon-close icons">x</i></div>'

$fileupload.each(function() {
var self = this;
var $dropfield = $('<div class="drop-field"><div class="drop-area"></div></div>');
$(self).after($dropfield).appendTo($dropfield.find('.drop-area'));
var $file_list = $(file_list).appendTo($dropfield);
$dropfield.append(hasitems);
$dropfield.append(rmv);
$(noitems).appendTo($file_list);
var isDropped = false;
$(self).on("change", function(evt) {
  if ($(self).val() == "") {
    $file_list.find('li').remove();
    $file_list.append(noitems);
  } else {
    if (!isDropped) {
      $dropfield.removeClass('hover');
      $dropfield.addClass('loaded');
      var files = $(self).prop("files");
      traverseFiles(files);
    }
  }
});

$dropfield.on("dragleave", function(evt) {
  $dropfield.removeClass('hover');
  evt.stopPropagation();
});

$dropfield.on('click', function(evt) {
  $(self).val('');
  $file_list.find('li').remove();
  $file_list.append(noitems);
  $dropfield.removeClass('hover').removeClass('loaded');
});

$dropfield.on("dragenter", function(evt) {
  $dropfield.addClass('hover');
  evt.stopPropagation();
});

$dropfield.on("drop", function(evt) {
  isDropped = true;
  $dropfield.removeClass('hover');
  $dropfield.addClass('loaded');
  var files = evt.originalEvent.dataTransfer.files;
  traverseFiles(files);
  isDropped = false;
});


function appendFile(file) {
  console.log(file);
  $file_list.append('<li>' + file.name + '</li>');
}

function traverseFiles(files) {
  if ($dropfield.hasClass('loaded')) {
    $file_list.find('li').remove();
  }
  if (typeof files !== "undefined") {
    for (var i = 0, l = files.length; i < l; i++) {
      appendFile(files[i]);
    }
  } else {
    alert("No support for the File API in this web browser");
  }
}

});
};

$(document).ready(function() {
globalFunctions.ddInput('input[type="file"]');
});