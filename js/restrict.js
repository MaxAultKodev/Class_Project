
function restrict(elem) {
                var tf = _(elem);
                var rx = new RegExp;
                if (elem == "trust") {
                    rx = /[0-9]/gi;
                }
                tf.value = tf.value.replace(rx, "");
            }