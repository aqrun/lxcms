import { PageList } from './pages/PageList';

export function init(){

    if(typeof g.page_admin_users_list !== 'undefined' && g.page_admin_users_list){
        PageList();
    }
}
