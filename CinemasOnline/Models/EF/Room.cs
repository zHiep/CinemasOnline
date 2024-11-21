using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("Room")]
    public class Room
    {
        public Room()
        {
            this.Rows = new HashSet<Row>();
            this.ShowTimes = new HashSet<ShowTime>();
        }

        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int RoomID { get; set; }
        public string RoomName { get; set; }
        public int NumberSeats { get; set; }
        public string Status { get; set; }
        public virtual ICollection<ShowTime> ShowTimes { get; set; }
        public virtual ICollection<Row> Rows { get; set; }
    }
}
