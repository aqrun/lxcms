import { PageList } from './pages/PageList';
import { PageCreate } from './pages/PageCreate';

export function init(){

    if(typeof g.page_admin_users_list !== 'undefined' && g.page_admin_users_list){
        PageList();
    }
    if(typeof g.page_admin_users_create !=='undefined' && g.page_admin_users_create){
        PageCreate();
    }
}
