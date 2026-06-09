<?php

namespace App\Notifications;

use App\Models\Komentar;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class KomentarDisukai extends Notification
{
    use Queueable;

    public function __construct(
        public Komentar $komentar,
        public User $pengirim,
    ) {}

    public function via(object $notifiable): array
    {
        return $notifiable->email_notifikasi ? ['mail'] : [];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $judulKonten = $this->komentar->commentable?->judul ?? 'Konten';
        $url = $this->komentar->commentable instanceof \App\Models\InformasiAdat
            ? route('informasi.show', $this->komentar->commentable)
            : route('kegiatan.show', $this->komentar->commentable);

        return (new MailMessage)
            ->subject("Komentar Anda disukai — \"{$judulKonten}\"")
            ->greeting("Halo {$notifiable->name}!")
            ->line("{$this->pengirim->name} menyukai komentar Anda pada \"{$judulKonten}\".")
            ->line("Komentar Anda: \"{$this->komentar->body}\"")
            ->action('Lihat Komentar', $url)
            ->line('Terima kasih telah berpartisipasi di forum diskusi Adat Desa Poto.');
    }
}
