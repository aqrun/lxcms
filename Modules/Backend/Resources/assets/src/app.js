
import { common } from './common';

(function($){
    $(function(){
        common();

        switch(g.menuUri){
            case '/backend/admin-users': import('app/admin-users').then(m => m.init()); break;
        }


    })
})(jQuery);