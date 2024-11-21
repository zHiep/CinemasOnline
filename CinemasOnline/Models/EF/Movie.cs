using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace CinemasOnline.Models.EF
{
    [Table("Movie")]
    public class Movie
    {
        public Movie()
        {
            this.ShowTimes = new HashSet<ShowTime>();
        }

        [Key]
        [DatabaseGeneratedAttribute(DatabaseGeneratedOption.Identity)]
        public int MovieID { get; set; }

        public int GenreID { get; set; }

        [Required(ErrorMessage = "Tên không được bỏ trống")]
        [StringLength(250)]
        public string MovieName { get; set; }

        [StringLength(250)]
        public string Poster { get; set; }

        public int Duration { get; set; }

        public DateTime ReleaseDate { get; set; }

        public DateTime EndDate { get; set; }

        public string Director { get; set; }

        public string Cast { get; set; }

        [StringLength(4000)]
        public string Synopsis { get; set; }

        public string Status { get; set; }

        public virtual Genre GenreIdNavigation { get; set; }

        public virtual ICollection<ShowTime> ShowTimes { get; set; }
    }
}
