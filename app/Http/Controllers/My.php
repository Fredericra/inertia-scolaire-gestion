<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Inertia\Inertia;
use App\Models\Admin;
use App\Models\Image;
use App\Models\Notif;
use App\Models\Abonne;
use App\Models\Favori;
use App\Models\Comment;
use App\Models\PagePub;
use App\Models\Mpianatra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class My extends Controller
{
    public function inscrire()
    {
        return inertia("Guest/Inscrire");
    }
    public function connexion()
    {
        return inertia("Guest/Connexion");
    }
    public function etudiant()
    {
        $un=Mpianatra::where('niveau',0)->orderBy("nom","ASC")->get();
        $deux=Mpianatra::where('niveau',1)->orderBy("nom","ASC")->get();
        $trois=Mpianatra::where('niveau',2)->orderBy("nom","ASC")->get();
        $quatre=Mpianatra::where('niveau',3)->orderBy("nom","ASC")->get();
        $cinq=Mpianatra::where('niveau',4)->orderBy("nom","ASC")->get();
        return inertia('Guest/Etudiant',[
            "un"=>$un,
            "deux"=>$deux,
            "trois"=>$trois,
            "quatre"=>$quatre,
            "cinq"=>$cinq
        ]);
    }
    public function about()
    {
        return inertia('Guest/About');
    }
    public function admin()
    {
        return inertia('Guest/Admin');
    }
    public function etude($email)
    {
        $etude = Mpianatra::where('email',$email)->first();
        return inertia('Guest/Persone',[
            "persone"=>$etude
        ]);
    }
    public function store_inscrire(Request $request)
    {
       $request->validate([
        "pseudo"=>["required","unique:admins"],
        "email"=>["required","unique:admins"],
        "password"=>["required","min:7","max:15",Password::min(8)->letters()->numbers()->mixedCase()],
        "confirm"=>["required","same:password"]
       ]);
       $admin = Admin::create([
        "pseudo"=>$request->pseudo,
        "email"=>$request->email,
        "verify"=>$request->check,
        "password"=>Hash::make($request->password)
       ]);
       if(Mpianatra::where('email',$request->email)->first())
       {
        $id = Admin::where("email",$request->email)->first();
        Mpianatra::where("email",$this->email)
        ->update(["admin_id"=>$id->id]);
       }
       Auth::login($admin);
       return to_route('compte');
       
       
    }
    public function compte()
    {
        return inertia('User/Compte');
    }
    public function sortie($id)
    {
        $user = Admin::find($id);
        Auth::logout($user);
        return to_route("home");
    }
    public function store_connexion(Request $request)
    {
        $request->validate([
            "email"=>"required|email|exists:admins",
            "password"=>"required"
        ]);
        if(Auth::attempt(["password"=>$request->password,"email"=>$request->email]))
        {
            return to_route("compte");
        }
        else{
            if(!Admin::where("email",$request->email)->first())
            {
                return back()->withErrors("email","email ,exites pas");
            }
            else{
                return back()->withErrors(["password"=>"mots de pass incorrect"]);
            }
        }
       
    }
    public function post()
    {
        return inertia("User/Creer");
    }
    public function sotre_poste(Request $request)
    {
        $request->validate([
            "titre"=>"required",
            "recupe"=>"required",
            "description"=>"required",
            "avatar"=>"required"
        ]);
        $note = Notif::create([
            "titre"=>$request->titre,
            "recupe"=>$request->recupe,
            "description"=>$request->description,
            "admins_id"=>Auth::id()
        ]);
        $image = new Image();
        $path = Storage::disk('public')->put('avatar',$request->avatar);
        $url = Storage::disk('local')->url($request->avatar);
        $note->image()->create([
            "image"=>$path,
            "url"=>$url
        ]);
    }
    public function notif()
    {
        $notif = Notif::with(['image','admins',"favoris","commentaire"])
        ->get();
        $image = Image::all();
        $notif->each(function ($notifs){
            if($notifs->image)
            {
               $notifs->image->image=asset(Storage::url($notifs->image->image));
               $notifs->description = preg_replace_callback("#@[a-zA-Z0-9_]+#",
               function ($match){
                return  '<Link class="text-blue-400">"'.$match[0].'"<Link>';
               } ,$notifs->description);  
            }
            $notifs->commentaire->each(function($comment){
                $user = Admin::find($comment->admin_id);
                $comment->commentaire_page="@".$user->pseudo;
            });
        });
        return Inertia::render("User/Notif",[
            "notif"=>$notif,
            "image"=>$image
        ]);
    }
    public function suivre(Request $request)
    {
        $user = Admin::findOrFail($request->admin);
        $article = Notif::findOrFail($request->id);
        if(Favori::where(["admin_id"=>$user->id,"notif_id"=>$article->id])->first())
        {
        Favori::where(["admin_id"=>$user->id,"notif_id"=>$article->id])
            ->update(["suivre"=>!$request->suivre]);
        }
        else{
            $user->favoris()->create([
                "notif_id"=>$article->id,
                "suivre"=>$request->suivre,
            ]);
        }
    }
    public function page()
    {
        $page = Page::where("admin_id",Auth::id())->get();
        $page1 = Page::where("admin_id","!=",Auth::id())->get();
        return inertia('User/Page',[
            "page"=>$page,
            "suggest"=>$page1,
        ]);
    }
    public function pages(Request $request)
    {
        $request->validate([
            "nom"=>"required|unique:pages",
            "slog"=>"required|unique:pages",
            "type"=>"required",
            "description"=>"required"
        ]);
        $page = Page::create([
            "nom"=>$request->nom,
            "slog"=>$request->slog,
            "type"=>$request->type,
            "description"=>$request->description,
            "admin_id"=>$request->user
        ]);
       
        
    }
    public function pager($id)
    {
        $pager= Page::findOrFail($id);
        $pager->delete();
        $pages = Page::with("suivre")
        ->where("admin_id",Auth::check())->get();
       return to_route('page',["page"=>$pages]);
    }
    public function mypage($name)
    {
        $page = Page::with("admin","suivre")
        ->where("nom",$name)->first();
        $pub = PagePub::with(["image","page","admin"])
        ->where("page_id",$page->id)
        ->orderBy("id","desc")
        ->get();
        $pub->each(function($pubs){
            if($pubs->image)
            {
                $pubs->image->image_page=asset(Storage::url($pubs->image->image_page));
            }
          });
        return inertia("User/MyPage",
        [
            "mypage"=>$page,
            "pub"=>$pub
        ]);
    }
    public function avec($id)
    {
        $page = Page::findOrFail($id);
            return inertia("User/PageCreer",
        [
            "page"=>$page
        ]);
    }
    public function creation(Request $request)
    {
       $request->validate([
        "titre"=>"required",
        "avatar"=>"required",
        "description"=>"required"
       ]);
       $page= PagePub::create([
        "page_id"=>$request->id,
        "admin_id"=>$request->admin,
        "titre"=>$request->titre,
        "description"=>$request->description,
       ]);
       $path = Storage::disk("public")->put("page",$request->avatar);
      $page->image()->create([
        "image_page"=>$path,
        "url"=>"null",
      ]);
      $name = Page::find($request->id);
      return to_route("mypage",$name->nom);
    }
    public function abonne(Request $request)
    {
      $page = Page::find($request->page_id);
      if(Abonne::where(["admin_id"=>$request->admin,"page_id"=>$request->page_id])->first())
      {
         Abonne::where(["admin_id"=>$request->admin,"page_id"=>$request->page_id])->delete();
        
      }
      else{
        Abonne::create([
            "admin_id"=>$request->admin,
            "page_id"=>$request->page_id,
            "suivre"=>true,
        ]);
      }
    }
    public function efface(Request $request)
    {
        $page = PagePub::find($request->id);
        Storage::disk("public")->delete($page->image->image_page);
        $page->delete();
        return to_route("mypage",$request->nom);
    }
    public function annuler(Request $request)
    {
        $page = Notif::find($request->id);
        Storage::disk("public")->delete($page->image->image);
        $page->delete();
        return to_route("notif");
    }
    public function tous(Request $request)
    {
        $page = Page::with("suivre","pub","admin")
        ->where("type","cours")
        ->get();
        return inertia("User/Tous",
    [
        "cours"=>$page,
        "admin"=>Admin::all()
    ]);
    }
    public function commente(Request $request)
    {
        $request->validate([
            "comment"=>"required"
        ]);
        Comment::create([
            "admin_id"=>$request->admin,
            "notif_id"=>$request->id,
            "commentaire"=>$request->comment,
        ]);
        return to_route("notif");
            
    }
    public function delete(Request $request)
    {
        $comment = Comment::find($request->id);
        $comment->delete();
        return to_route("notif");
    }
}
