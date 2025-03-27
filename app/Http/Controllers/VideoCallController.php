// app/Http/Controllers/TestVideoController.php
namespace App\Http\Controllers;

class TestVideoController extends Controller
{
    public function index()
    {
        return view('user.videocall.index');
    }
}