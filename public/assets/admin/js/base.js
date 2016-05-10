String.prototype.trim = function() {
    return this.replace(/(^\s*)|(\s*$)/g, '');
}

String.prototype.nl2br = function() {
    return this.replace(/(\r\n?|\n)/g, '<br>');
}

String.prototype.assign = function(replace, exclude, nl2br) {

    var placeHolder;
    var value = this;
    var list = value.match(/(\{|(%7B))\$.+?(\}|(%7D))/ig);
    var nl2br = nl2br || true;
    var isIE = /*@cc_on!@*/false;

    for (var i = 0; placeHolder = list[i]; i++)
    {
        var key = placeHolder.replace('{', '')
            .replace('}', '')
            .replace('$', '')
            .replace('%7B', '', 'i')
            .replace('%7D', '', 'i');

        if (replace[key] === false ||
            replace[key] === null  ||
            replace[key] === undefined) {

            value = value.replace(placeHolder, '');
            continue;
        }

        if (exclude && $.inArray(key, exclude) != -1) {
            // no escape
            value = value.replace(placeHolder, replace[key], 'g');
            continue;
        }

        if (nl2br) {
            // lineFeed replacing for IE
            if (isIE) {
                value = value.replace(placeHolder,
                            $('<div />').text(String(replace[key]).replace(/(\r\n?|\n)/g, '###lineFeed###'))
                                        .html().replace(/###lineFeed###/g, '<br>'), 'g');
            } else {
                value = value.replace(placeHolder,
                            $('<div />').text(replace[key]).html().nl2br(), 'g');
            }
            continue;
        }

        value = value.replace(placeHolder, $('<div/>').text(replace[key]).html(), 'g');
    }

    return value;
}

function redirect(url, delay)
{
    var url = url || '/';
    var delay = delay || 2000;

    setTimeout(function() {
        window.location.href = url;
    }, delay);
}
