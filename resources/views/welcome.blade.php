<html>
    <link href="/app.css" rel="stylesheet">

    @livewire(App\Http\Livewire\Counter::class)

    <script>
        // find all elements with wire:snapshot
        document.querySelectorAll('[wire\\:snapshot]').forEach(el => {
            let snapshot = JSON.parse(el.getAttribute('wire:snapshot'))
            el.addEventListener('click',e => {
                if(! e.target.hasAttribute('wire:click')) return
                    let method = e.target.getAttribute('wire:click')
                alert(method)
                    fetch('/livewire',{
                        method:'POST',
                        headers: {'Content-Type': 'application/json'},
                        body: JSON.stringify({
                            snapshot,
                            callMethod : method
                        })
                    })
            })
        })
        // go through each, pull out the string of data
        // turn that string into an actual JavaScript object
        // ...
    </script>
</html>
