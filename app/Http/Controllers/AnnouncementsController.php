<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $announcements = Announcements::paginate(10);

        return view('modules.announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view('modules.announcement.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'content' => 'required',
        ]);

        $announcement = new Announcements();
        $announcement->title = $validated['title'];
        $announcement->date = $validated['date'];
        $announcement->content = $validated['content'];
        $announcement->save();

        return redirect()->route('announcement.index')->with('success', 'Announcement created successfully');
    }

    public function edit($id)
    {
        $announcement = Announcements::find($id);

        return view('modules.announcement.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'content' => 'required',
        ]);

        $announcement = Announcements::find($id);

        if ($announcement) {
            $announcement->title = $validated['title'];
            $announcement->date = $validated['date'];
            $announcement->content = $validated['content'];
            $announcement->save();
        } else {
            $announcement = new Announcements();
            $announcement->title = $validated['title'];
            $announcement->date = $validated['date'];
            $announcement->content = $validated['content'];
            $announcement->save();
        }

        return redirect()->route('announcement.index')->with('success', 'Announcement updated successfully');
    }

    public function destroy($id)
    {
        $announcement = Announcements::find($id);

        if ($announcement) {
            $announcement->delete();
        } else {
            return redirect()->route('announcement.index')->with('error', 'Announcement not found');
        }

        return redirect()->route('announcement.index')->with('success', 'Announcement deleted successfully');
    }
}
