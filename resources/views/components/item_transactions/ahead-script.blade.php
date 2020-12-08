<script>
    (async function () {
        const path = "{{ route('items.autocomplete') }}";
        const asyncExample = async () => {
            let data;
            try {
                data = await fetch(path);
            } catch (err) {
                console.log(err);
            }
            return await data.json();
        };

        const globalData = await asyncExample();
        const nameCt = globalData.map(item => item.name)

        const substringMatcher = function (strs) {
            return function findMatches(q, cb) {
                let matches;

                // an array that will be populated with substring matches
                matches = [];

                // regex used to determine if a string contains the substring `q`
                substrRegex = new RegExp(q, 'i');

                // iterate through the pool of strings and for any string that
                // contains the substring `q`, add it to the `matches` array
                $.each(strs, function (i, str) {
                    if (substrRegex.test(str)) {
                        matches.push(str);
                    }
                });

                $('.qty').val('o')
                cb(matches);
            };
        };

        $('#the-basics .typeahead').typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            },
            {
                name: 'states',
                source: substringMatcher(nameCt)
            });
    })()
</script>
