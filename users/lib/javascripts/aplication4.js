$().ready(function() {
    // search only, if the regexp matches
    var report = [
        "CBC","Blood Group","BLEEDING TIME","CLOTING TIME","MD","ESR",
        "FBS","PPBS","RBS","RBS ON GLUCOMETER","HbA1C",
        "S.CHOLESTEROL","S.TRIGLY","S.HDL","S.LDL","S.CREATININE","BLOOD UREA","S.URIC ACID","S.BILLIRUBIN",
        "S.ALKALINE PHOSPHATE","SGPT","S.WIDAL","URINE ROUTINE/MICRO","STOOL EXAM","S.T3","S.T4",
        "S.TSH","DANGUE NS1","TRIPLE MARKER","HIV 1 AND 2","HBSAG","VDRL","X-RAY CHEST","X-RAY Leg","X-RAY Hand",
        "X-RAY Head"
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

    $("#report").autocomplete({
        position: { my : "right top", at: "right bottom" },
        source: function(request, response) {
            var str = _leftMatch(request.term, $("#report")[0]);
            str = (str != null) ? str[0] : "";
            response($.ui.autocomplete.filter(
                report, str));
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