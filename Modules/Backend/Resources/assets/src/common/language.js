
import i18next from 'i18next';

export function initLanguage(options){
    i18next.init({
        lng: g.locale,
        fallbackLng: 'en-US',
        resources: {
            'en-US': {translation: options['en-US']},
            'zh-CN': {translation: options['zh-CN']},
        },
        debug: true
    }, (err, t) => {
        if (err){
            return console.log('something went wrong loading', err);
        }
    });
}

export function __(key){
    if(i18next.exists(key)){
        return i18next.t(key);
    }else{
        return key;
    }
}
