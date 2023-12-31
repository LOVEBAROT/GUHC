$().ready(function() {
    // search only, if the regexp matches
    var cities1 = [
        "Amino Acid","Arterial Blood Gas","Oral Contraceptive Pill","Oral Polio Vaccine","penicillin","Acid Fast",
        "Alcohol On breath","Bipolar Affective Disorder","Bowel Movement(BP)","Cancer","Coronary Artery Disease",
        "Complete Blood Count","Headache","Abdominal Pain","Body ache","Ulcers","Normal Pain","Mouth Ulcers","Cold",
        "cough","Fever","Mind Fever","Injury","Hand Injury","Leg Injury"
    ];
    // Defines for the example the match to take which is any word (with Umlauts!!).
    function _leftMatch(string, area) {
        return string.substring(0, area.selectionStart).match(/[\wäöüÄÖÜß]+$/)
    }

    function _setCursorPosition(area, pos) {
        if (area.setSelectionRange) {
            area.setSelectionRange(pos, pos);
        } else if (area.createTextRange) {
            var range = area.createTextRange();
            range.collapse(true);
            range.moveEnd('character', pos);
            range.moveStart('character', pos);
            range.select();
        }
    }

    $("#citites1").autocomplete({
        position: { my : "right top", at: "right bottom" },
        source: function(request, response) {
            var str = _leftMatch(request.term, $("#citites1")[0]);
            str = (str != null) ? str[0] : "";
            response($.ui.autocomplete.filter(
                cities1, str));
        },
        //minLength: 2,  // does have no effect, regexpression is used instead
        focus: function() {
            // prevent value inserted on focus
            return false;
        },
        // Insert the match inside the ui element at the current position by replacing the matching substring
        select: function(event, ui) {
            //alert("completing "+ui.item.value);},
            var m = _leftMatch(this.value, this)[0];
            var beg = this.value.substring(0, this.selectionStart - m.length);
            this.value = beg + ui.item.value + this.value.substring(this.selectionStart, this.value.length);
            var pos = beg.length + ui.item.value.length;
            _setCursorPosition(this, pos);
            return false;
        },
        search:function(event, ui) {
            var m = _leftMatch(this.value, this);
            return (m != null )
        }
    });
})