using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("ShowTime")]
    public class ShowTime
    {
        public ShowTime()
        {
            this.Tickets = new HashSet<Ticket>();
        }

        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int ShowTimeID { get; set; }
        public int MovieID { get; set; }
        public int RoomID { get; set; }
        public decimal Price { get; set; }
        public string Time { get; set; }
        public DateTime Date { get; set; }
        public int AvailableSeats { get; set; }
        public ICollection<Ticket> Tickets { get; set; }
        public virtual Movie MovieIdNavigation { get; set; }
        public virtual Room RoomIdnavigation { get; set; }
    }
}
