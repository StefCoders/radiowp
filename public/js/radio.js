class SOVARadio
{
    constructor(radioId, settings) 
    {
        this.radio = $(radioId)
        this.settings = settings
    }

    playOrStop(e) 
    {
        const audio = this.radio
            .find('.radio__audio')[0]
        if (this.radio.hasClass('playing')) { // if playing
            audio.pause()
            this.radio.removeClass('playing')
        } else { // if not playing
            audio.src = this.settings.stream_url
            audio.play()
            this.radio.addClass('playing')
        }
    }

    onOrOffVolume(e)
    {
        const volumeSection = $(e.currentTarget)
            .closest('.radio__volume')
        const volumeInput = volumeSection.find('input')
        const audio = this.radio
            .find('.radio__audio')[0]
        if (volumeSection.hasClass('off')) { // if off
            volumeSection.removeClass('off')
            volumeInput.val(10)
            audio.volume = 1
        } else { // if on
            volumeSection.addClass('off')
            volumeInput.val(0)
            audio.volume = 0
        }
    }

    changeVolume(e)
    {
        const volume = $(e.currentTarget).val() / 10
        const audio = this.radio
            .find('.radio__audio')[0]
        audio.volume = volume
        const volumeSection = this.radio
            .find('.radio__volume')
        if (audio.volume == 0) { // if off
            volumeSection.addClass('off')
        } else { // if on
            volumeSection.removeClass('off')
        }
    }

    showHistory(e)
    {
        this.radio.addClass('show-history')
    }

    hideHistory(e)
    {
        this.radio.removeClass('show-history')
    }

    getHistory()
    {
        $.get(
            this.settings.history_url, 
            res => {
                const history = res.items
                let tracks = [];
                history.forEach(
                    track => tracks += this.#trackHtml(track)
                )

                const historyList = this.radio
                    .find('.history__list')
                historyList.html(tracks)
                
                // repeat after delay
                setTimeout(
                    this.getHistory.bind(this), 
                    10 * 1000
                )
            }
        )
    }

    #trackHtml(track)
    {
        track = track.title.split('-')

        return  `<div class="history__track">
                    <span class="history__track-name">
                        ${track[0]}
                    </span>
                    -
                    <span class="history__track-perfomer">
                        ${track[1]}
                    </span>
                </div>`;
    }
}


function sova_radio(radioId, settings = {}) {
    settings = Object.assign(
        {
			stream_url: '',
            history_url: '',
        }, 
        settings
    )

    const radio = new SOVARadio(
        `#${radioId}`,
        settings
    );

    radio.getHistory()

    $(`#${radioId} .radio__play`)
        .click(e => radio.playOrStop(e))
    $(`#${radioId} .radio__volume img`)
        .click(e => radio.onOrOffVolume(e))
    $(`#${radioId} .radio__volume input`)
        .bind('input', e => radio.changeVolume(e))
    $(`#${radioId} .radio__history`)
        .click(e => radio.showHistory(e))
    $(`#${radioId} .history__close`)
        .click(e => radio.hideHistory(e))
}